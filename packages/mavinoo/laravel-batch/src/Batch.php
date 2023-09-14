<?php declare(strict_types=1);

namespace Mavinoo\Batch;

use Mavinoo\Batch\Common\Common;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\DatabaseManager;
use Illuminate\Support\Carbon;

class Batch implements BatchInterface
{
    /**
     * @var DatabaseManager
     */
    protected $db;

    public function __construct(DatabaseManager $db)
    {
        $this->db = $db;
    }

    /**
     * <h2>Update multiple rows.</h2>
     *
     * Example:<br>
     * ```
     * $userInstance = new \App\Models\User;
     * $value = [
     *     [
     *         'id' => 1,
     *         'status' => 'active',
     *         'nickname' => 'Mohammad'
     *     ],
     *     [
     *         'id' => 5,
     *         'status' => 'deactive',
     *         'nickname' => 'Ghanbari'
     *     ],
     *     [
     *         'id' => 7,
     *         'balance' => ['+', 500]
     *     ]
     * ];
     * $index = 'id';
     * Batch::update($userInstance, $value, $index);
     * ```
     *
     * @param \Illuminate\Database\Eloquent\Model $table
     * @param array $values
     * @param string $index
     * @param bool $raw
     * @return bool|int
     * @updatedBy Ibrahim Sakr <ebrahimes@gmail.com>
     */
    public function update(Model $table, array $values, string $index = null,  $self = false, $sign = '-', $where = '')
    {
        $final = [];
        $ids = [];

        if (!count($values)) {
            return false;
        }

        if (!isset($index) || empty($index)) {
            $index = $table->getKeyName();
        }
        // $final[$field][] = 'WHEN `' . $index . '` = "' . $val[$index] . '" AND `' . $field . '`' . $sign . $value . '>=0 THEN `' . $field . '`' . $sign . $value . ' ';

        foreach ($values as $key => $val) {
            $ids[] = $val[$index];
            if ($self) {
                foreach (array_keys($val) as $field) {
                    if ($field !== $index) {
                        $value = (is_null($val[$field]) ? 'NULL' : '' . Common::mysql_escape($val[$field]) . '');
                        $final[$field][] = 'WHEN `' . $index . '` = "' . $val[$index] . '" THEN `' . $field . '`' . $sign . $value . ' ';
                    }
                }


            } else {
                foreach (array_keys($val) as $field) {
                    if ($field !== $index) {
                        $value = (is_null($val[$field]) ? "NULL" : "'" . Common::mysql_escape($val[$field]) .  "'");
                        $final[$field][] = 'WHEN `' . $index . '` = "' . $val[$index] . '" THEN ' . $value . ' ';
                    }
                }
            }
        }
        $cases = '';
        foreach ($final as $k => $v) {
            $cases .= '`' . $k . '` = (CASE ' . implode("\n", $v) . "\n"
                . 'ELSE `' . $k . '` END), ';
        }

        $query = "UPDATE `" . $this->getFullTableName($table) . "` SET " . substr($cases, 0, -2) . " WHERE `$index` IN(" . '"' . implode('","', $ids) . '"' . ") $where;";
        return $this->db->connection($this->getConnectionName($table))->update($query);
    }

    /**
     * Update multiple rows
     * @param Model $table
     * @param array $values
     * @param string $index
     * @param string|null $index2
     * @param bool $raw
     * @return bool|int
     * @updatedBy Ibrahim Sakr <ebrahimes@gmail.com>
     *
     * @desc
     * Example
     * $table = 'users';
     * $value = [
     *     [
     *         'id' => 1,
     *         'status' => 'active',
     *         'nickname' => 'Mohammad'
     *     ] ,
     *     [
     *         'id' => 5,
     *         'status' => 'deactive',
     *         'nickname' => 'Ghanbari'
     *     ] ,
     * ];
     * $index = 'id';
     * $index2 = 'user_id';
     *
     */
    public function updateWithTwoIndex(Model $table, array $values, string $index = null, string $index2 = null, bool $raw = null)
    {
        $final = [];
        $ids = [];
        $ids2 = [];

        if (!count($values)) {
            return false;
        }

        if (!isset($index) || empty($index)) {
            $index = $table->getKeyName();
        }

        foreach ($values as $key => $val) {
            $ids[] = $val[$index];
            $ids2[] = $val[$index2];
            foreach (array_keys($val) as $field) {
                if ($field !== $index OR $field !== $index2) {
                    $value = (is_null($val[$field]) ? 'NULL' : '"' . Common::mysql_escape($val[$field]) . '"');
                    $final[$field][] = 'WHEN (`' . $index . '` = "' . $val[$index] . '" AND `' . $index2 . '` = "' . $val[$index2] . '" )THEN ' . $value . ' ';
                }
            }
        }
        $cases = '';
        foreach ($final as $k => $v) {
            $cases .= '`' . $k . '` = (CASE ' . implode("\n", $v) . "\n"
                . 'ELSE `' . $k . '` END), ';
        }

        $query = "UPDATE `" . $this->getFullTableName($table) . "` SET " . substr($cases, 0, -2) . " WHERE `$index` IN(" . '"' . implode('","', $ids) . '"' . ") AND `$index2` IN(" . '"' . implode('","', $ids2) . '"' . ");";
        //echo $query;

        return $this->db->connection($this->getConnectionName($table))->update($query);
    }

    public function update_dual(Model $table, array $values, string $index = null, $index2 = null)
    {
        $final = [];
        $ids = [];
        $ids2 = [];

        if (!count($values)) {
            return false;
        }

        if (!isset($index) || empty($index)) {
            $index = $table->getKeyName();
        }

        foreach ($values as $key => $val) {
            $ids[] = $val[$index];
            $ids2[] = $val[$index2];
            foreach (array_keys($val) as $field) {
                if ($field !== $index OR $field !== $index2) {
                    $value = (is_null($val[$field]) ? 'NULL' : '"' . Common::mysql_escape($val[$field]) . '"');
                    $final[$field][] = 'WHEN (`' . $index . '` = "' . $val[$index] . '" AND `' . $index2 . '` = "' . $val[$index2] . '" )THEN ' . $value . ' ';
                }
            }
        }
        $cases = '';
        foreach ($final as $k => $v) {
            $cases .= '`' . $k . '` = (CASE ' . implode("\n", $v) . "\n"
                . 'ELSE `' . $k . '` END), ';
        }

        $query = "UPDATE `" . $this->getFullTableName($table) . "` SET " . substr($cases, 0, -2) . " WHERE `$index` IN(" . '"' . implode('","', $ids) . '"' . ") AND `$index2` IN(" . '"' . implode('","', $ids2) . '"' . ");";
        //echo $query;

        return $this->db->connection($this->getConnectionName($table))->update($query);
    }

    /**
     * Insert Multi rows.
     *
     * @param Model $table
     * @param array $columns
     * @param array $values
     * @param int $batchSize
     * @param bool $insertIgnore
     * @return bool|mixed
     * @throws \Throwable
     * @updatedBy Ibrahim Sakr <ebrahimes@gmail.com>
     * @desc
     * Example
     *
     * $table = 'users';
     * $columns = [
     *      'firstName',
     *      'lastName',
     *      'email',
     *      'isActive',
     *      'status',
     * ];
     * $values = [
     *     [
     *         'Mohammad',
     *         'Ghanbari',
     *         'emailSample_1@gmail.com',
     *         '1',
     *         '0',
     *     ] ,
     *     [
     *         'Saeed',
     *         'Mohammadi',
     *         'emailSample_2@gmail.com',
     *         '1',
     *         '0',
     *     ] ,
     *     [
     *         'Avin',
     *         'Ghanbari',
     *         'emailSample_3@gmail.com',
     *         '1',
     *         '0',
     *     ] ,
     * ];
     * $batchSize = 500; // insert 500 (default), 100 minimum rows in one query
     */
    public function insert(Model $table, array $columns, array $values, int $batchSize = 500, bool $insertIgnore = false)
    {
        // no need for the old validation since we now use type hint that supports from php 7.0
        // but I kept this one
        if (count($columns) !== count(current($values))) {
            return false;
        }

        $query = [];
        $minChunck = 100;

        $totalValues = count($values);
        $batchSizeInsert = ($totalValues < $batchSize && $batchSize < $minChunck) ? $minChunck : $batchSize;

        $totalChunk = ($batchSizeInsert < $minChunck) ? $minChunck : $batchSizeInsert;

        $values = array_chunk($values, $totalChunk, true);

        if ($table->usesTimestamps()) {
            $createdAtColumn = $table->getCreatedAtColumn();
            $updatedAtColumn = $table->getUpdatedAtColumn();
            $now = Carbon::now()->format($table->getDateFormat());

            $addCreatedAtValue = false;
            $addUpdatedAtValue = false;

            if (!in_array($createdAtColumn, $columns)) {
                $addCreatedAtValue = true;
                array_push($columns, $createdAtColumn);
            }

            if (!in_array($updatedAtColumn, $columns)) {
                $addUpdatedAtValue = true;
                array_push($columns, $updatedAtColumn);
            }

            foreach ($values as $key => $value) {
                foreach ($value as $rowKey => $row) {
                    if ($addCreatedAtValue) {
                        array_push($values[$key][$rowKey], $now);
                    }

                    if ($addUpdatedAtValue) {
                        array_push($values[$key][$rowKey], $now);
                    }
                }
            }
        }

        $connection = config('database.default');
        $driver = config("database.connections.{$connection}.driver");

        if (Common::disableBacktick($driver)) {
            foreach ($columns as $key => $column) {
                $columns[$key] = '"' . Common::mysql_escape($column) . '"';
            }
        } else {
            foreach ($columns as $key => $column) {
                $columns[$key] = '`' . Common::mysql_escape($column) . '`';
            }
        }

        foreach ($values as $value) {
            $valueArray = [];
            foreach ($value as $data) {
                foreach ($data as $key => $item) {
                    $item = is_null($item) ? 'NULL' : "'" . Common::mysql_escape($item) . "'";
                    $data[$key] = $item;
                }

                $valueArray[] = '(' . implode(',', $data) . ')';
            }

            $valueString = implode(', ', $valueArray);

            $ignoreStmt = $insertIgnore ? ' IGNORE ' : '';

            if (Common::disableBacktick($driver)) {
                $query[] = 'INSERT ' . $ignoreStmt . ' INTO "' . $this->getFullTableName($table) . '" (' . implode(',', $columns) . ") VALUES $valueString;";
            } else {
                $query[] = 'INSERT ' . $ignoreStmt . ' INTO `' . $this->getFullTableName($table) . '` (' . implode(',', $columns) . ") VALUES $valueString;";
            }
        }

        if (count($query)) {
            return $this->db->transaction(function () use ($totalValues, $totalChunk, $query, $table) {
                $totalQuery = 0;
                foreach ($query as $value) {
                    $totalQuery += $this->db->connection($this->getConnectionName($table))->statement($value) ? 1 : 0;
                }

                return [
                    'totalRows' => $totalValues,
                    'totalBatch' => $totalChunk,
                    'totalQuery' => $totalQuery
                ];
            });
        }

        return false;
    }

    /**
     * Get full table name.
     *
     * @param Model $model
     * @return string
     * @author Ibrahim Sakr <ebrahimes@gmail.com>
     */
    private function getFullTableName(Model $model)
    {
        return $model->getConnection()->getTablePrefix() . $model->getTable();
    }

    /**
     * Get connection name.
     *
     * @param Model $model
     * @return string|null
     * @author Ibrahim Sakr <ebrahimes@gmail.com>
     */
    private function getConnectionName(Model $model)
    {
        if (!is_null($cn = $model->getConnectionName())) {
            return $cn;
        }

        return $model->getConnection()->getName();
    }
}
