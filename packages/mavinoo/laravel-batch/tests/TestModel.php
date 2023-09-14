<?php declare(strict_types=1);

class TestModel extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'HmKTjCJgLN9bBq7KXzI3';

    protected $casts = [
        'is_vip' => 'boolean'
    ];

    /**
     * Get name of the table.
     *
     * @return string
     */
    public function tableName()
    {
        return $this->table;
    }
}
