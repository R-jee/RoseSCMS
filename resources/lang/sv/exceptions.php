<?php 
return [
  'valid_entry_account' => 'Ange ett giltigt försäljnings- och inköpskonto i Konton och transaktionsinställningar.',
  'valid_account' => 'Ange giltiga inställningar i Konton och transaktionsinställningar.',
  'backend' => [
    'access' => [
      'roles' => 
      [
        'already_exists' => 'Den rollen finns redan. Välj ett annat namn.',
        'cant_delete_admin' => 'Du kan inte ta bort administratörsrollen.',
        'create_error' => 'Det var problem med att skapa denna roll. Var god försök igen.',
        'delete_error' => 'Det gick inte att ta bort den här rollen. Var god försök igen.',
        'has_users' => 'Du kan inte ta bort en roll med tillhörande användare.',
        'needs_permission' => 'Du måste välja minst en behörighet för den här rollen.',
        'not_found' => 'Den rollen finns inte.',
        'update_error' => 'Det uppstod ett problem med att uppdatera den här rollen. Var god försök igen.',
      ],
      'permissions' => 
      [
        'already_exists' => 'Det tillståndet finns redan. Välj ett annat namn.',
        'create_error' => 'Det uppstod ett problem med att skapa denna behörighet. Var god försök igen.',
        'delete_error' => 'Det gick inte att ta bort denna behörighet. Var god försök igen.',
        'not_found' => 'Det tillståndet finns inte.',
        'update_error' => 'Det gick inte att uppdatera den här behörigheten. Var god försök igen.',
      ],
      'users' => 
      [
        'cant_deactivate_self' => 'Du kan inte göra det åt dig själv.',
        'cant_delete_self' => 'Du kan inte ta bort dig själv.',
        'cant_delete_admin' => 'Du kan inte ta bort administratören.',
        'cant_delete_own_session' => 'Du kan inte ta bort din egen session.',
        'cant_restore' => 'Den här användaren raderas inte så den kan inte återställas.',
        'create_error' => 'Det uppstod ett problem med att skapa den här användaren. Var god försök igen.',
        'delete_error' => 'Det gick inte att ta bort den här användaren. Var god försök igen.',
        'delete_first' => 'Den här användaren måste raderas först innan den kan förstöras permanent.',
        'email_error' => 'Den e-postadressen tillhör en annan användare.',
        'mark_error' => 'Det gick inte att uppdatera den här användaren. Var god försök igen.',
        'not_found' => 'Den användaren finns inte.',
        'restore_error' => 'Det gick inte att återställa den här användaren. Var god försök igen.',
        'role_needed_create' => 'Du måste välja vid hyresavtal en roll.',
        'role_needed' => 'Du måste välja minst en roll.',
        'session_wrong_driver' => 'Din session drivrutin måste vara inställd på databas för att använda den här funktionen.',
        'change_mismatch' => 'Det är inte ditt gamla lösenord.',
        'update_error' => 'Det gick inte att uppdatera den här användaren. Var god försök igen.',
        'update_password_error' => 'Det gick inte att ändra lösenordet för användarna. Var god försök igen.',
      ],
    ],
    'pages' => [
      'already_exists' => 'Den sidan finns redan. Välj ett annat namn.',
      'create_error' => 'Det uppstod ett problem med att skapa den här sidan. Var god försök igen.',
      'delete_error' => 'Det gick inte att ta bort den här sidan. Var god försök igen.',
      'not_found' => 'Den sidan finns inte.',
      'update_error' => 'Det uppstod ett problem med att uppdatera denna sida. Var god försök igen.',
    ],
    'blogcategories' => [
      'already_exists' => 'Den bloggkategorin finns redan. Välj ett annat namn.',
      'create_error' => 'Det uppstod ett problem med att skapa denna bloggkategori. Var god försök igen.',
      'delete_error' => 'Det gick inte att ta bort den här bloggkategorin. Var god försök igen.',
      'not_found' => 'Den bloggkategorin finns inte.',
      'update_error' => 'Det gick inte att uppdatera denna bloggkategori. Var god försök igen.',
    ],
    'blogtags' => [
      'already_exists' => 'Den bloggtaggen finns redan. Välj ett annat namn.',
      'create_error' => 'Det uppstod ett problem med att skapa denna bloggtagg. Var god försök igen.',
      'delete_error' => 'Det gick inte att ta bort denna bloggtagg. Var god försök igen.',
      'not_found' => 'Den bloggtaggen finns inte.',
      'update_error' => 'Det uppstod ett problem med att uppdatera denna bloggtagg. Var god försök igen.',
    ],
    'settings' => [
      'update_error' => 'Det gick inte att uppdatera inställningarna. Var god försök igen.',
    ],
    'menus' => [
      'already_exists' => 'Den menyn finns redan. Välj ett annat namn.',
      'create_error' => 'Det gick inte att skapa den här menyn. Var god försök igen.',
      'delete_error' => 'Det gick inte att ta bort den här menyn. Var god försök igen.',
      'not_found' => 'Den menyn finns inte.',
      'update_error' => 'Det gick inte att uppdatera den här menyn. Var god försök igen.',
    ],
    'modules' => [
      'already_exists' => 'Den modulen finns redan. Välj ett annat namn.',
      'create_error' => 'Det uppstod ett problem med att skapa den här modulen. Var god försök igen.',
      'delete_error' => 'Det gick inte att ta bort den här modulen. Var god försök igen.',
      'not_found' => 'Den modulen finns inte.',
      'update_error' => 'Det gick inte att uppdatera den här modulen. Var god försök igen.',
    ],
    'plans' => [
      'already_exists' => 'Den planen finns redan. Välj ett annat namn.',
      'create_error' => 'Det var ett problem med att skapa denna plan. Var god försök igen.',
      'delete_error' => 'Det gick inte att ta bort denna plan. Var god försök igen.',
      'not_found' => 'Den planen finns inte.',
      'update_error' => 'Det uppstod ett problem med att uppdatera denna plan. Var god försök igen.',
    ],
    'geos' => [
      'already_exists' => 'Den Geo finns redan. Välj ett annat namn.',
      'create_error' => 'Det uppstod ett problem med att skapa denna Geo. Var god försök igen.',
      'delete_error' => 'Det gick inte att ta bort denna Geo. Var god försök igen.',
      'not_found' => 'Den Geo finns inte.',
      'update_error' => 'Det gick inte att uppdatera denna Geo. Var god försök igen.',
    ],
    'customers' => [
      'already_exists' => 'Den kunden finns redan. Välj ett annat namn.',
      'create_error' => 'Det uppstod ett problem med att skapa den här kunden. Var god försök igen.',
      'delete_error' => 'Det gick inte att ta bort den här kunden. Var god försök igen.',
      'not_found' => 'Kunden finns inte.',
      'update_error' => 'Det gick inte att uppdatera den här kunden. Var god försök igen.',
    ],
    'customergroups' => [
      'already_exists' => 'Den kundgruppen finns redan. Välj ett annat namn.',
      'create_error' => 'Det uppstod ett problem med att skapa denna kundgrupp. Var god försök igen.',
      'delete_error' => 'Det gick inte att ta bort den här kundgruppen. Var god försök igen.',
      'not_found' => 'Den kundgruppen finns inte.',
      'update_error' => 'Det gick inte att uppdatera den här kundgruppen. Var god försök igen.',
    ],
    'warehouses' => [
      'already_exists' => 'Det lagret finns redan. Välj ett annat namn.',
      'create_error' => 'Det var problem med att skapa detta lager. Var god försök igen.',
      'delete_error' => 'Det gick inte att ta bort detta lager. Var god försök igen.',
      'not_found' => 'Det lagret finns inte.',
      'update_error' => 'Det uppstod ett problem med att uppdatera detta lager. Var god försök igen.',
    ],
    'productcategories' => [
      'already_exists' => 'Den produktkategorin finns redan. Välj ett annat namn.',
      'create_error' => 'Det uppstod ett problem med att skapa denna produktkategori. Var god försök igen.',
      'delete_error' => 'Det gick inte att ta bort den här produktkategorin. Var god försök igen.',
      'not_found' => 'Den produktkategorin finns inte.',
      'update_error' => 'Det gick inte att uppdatera denna produktkategori. Var god försök igen.',
    ],
    'products' => [
      'already_exists' => 'Denna produkt finns redan. Välj ett annat namn.',
      'create_error' => 'Det uppstod ett problem med att skapa den här produkten. Var god försök igen.',
      'delete_error' => 'Det gick inte att ta bort den här produkten. Var god försök igen.',
      'not_found' => 'Denna produkt finns inte.',
      'update_error' => 'Det gick inte att uppdatera den här produkten. Var god försök igen.',
    ],
    'invoices' => [
      'already_exists' => 'Denna faktura finns redan. Välj ett annat namn.',
      'create_error' => 'Det uppstod ett problem med att skapa den här fakturan. Var god försök igen.',
      'delete_error' => 'Det gick inte att ta bort den här fakturan. Var god försök igen.',
      'not_found' => 'Denna faktura finns inte.',
      'update_error' => 'Det uppstod ett problem med att uppdatera den här fakturan. Var god försök igen.',
    ],
    'additionals' => [
      'already_exists' => 'Den ytterligare finns redan. Välj ett annat namn.',
      'create_error' => 'Det uppstod ett problem med att skapa detta ytterligare. Var god försök igen.',
      'delete_error' => 'Det gick inte att ta bort detta tillägg. Var god försök igen.',
      'not_found' => 'Den ytterligare finns inte.',
      'update_error' => 'Det uppstod ett problem med uppdateringen. Var god försök igen.',
    ],
    'currencies' => [
      'already_exists' => 'Den valutan finns redan. Välj ett annat namn.',
      'create_error' => 'Det uppstod ett problem med att skapa den här valutan. Var god försök igen.',
      'delete_error' => 'Det gick inte att ta bort den här valutan. Var god försök igen.',
      'not_found' => 'Den valutan finns inte.',
      'update_error' => 'Det gick inte att uppdatera den här valutan. Var god försök igen.',
    ],
    'terms' => [
      'create_error' => 'Det uppstod ett problem med att skapa denna term. Var god försök igen.',
      'delete_error' => 'Det gick inte att ta bort den här termen. Var god försök igen. Du måste behålla minst en termin för alla moduler',
      'not_found' => 'Den termen finns inte.',
      'update_error' => 'Det gick inte att uppdatera den här termen. Var god försök igen.',
    ],
    'customfields' => [
      'already_exists' => 'Det anpassade fältet finns redan. Välj ett annat namn.',
      'create_error' => 'Det uppstod ett problem med att skapa detta anpassade fält. Var god försök igen.',
      'delete_error' => 'Det gick inte att ta bort det anpassade fältet. Var god försök igen.',
      'not_found' => 'Det anpassade fältet finns inte.',
      'update_error' => 'Det gick inte att uppdatera det anpassade fältet. Var god försök igen.',
    ],
    'prefixes' => [
      'already_exists' => 'Det prefixet finns redan. Välj ett annat namn.',
      'create_error' => 'Det uppstod ett problem med att skapa detta prefix. Var god försök igen.',
      'delete_error' => 'Det gick inte att ta bort detta prefix. Var god försök igen.',
      'not_found' => 'Det prefixet finns inte.',
      'update_error' => 'Det gick inte att uppdatera detta prefix. Var god försök igen.',
    ],
    'accounts' => [
      'already_exists' => 'Det kontot finns redan. Välj ett annat namn.',
      'create_error' => 'Det uppstod ett problem med att skapa detta konto. Var god försök igen.',
      'delete_error' => 'Det gick inte att ta bort det här kontot. Var god försök igen.',
      'not_found' => 'Kontot existerar inte.',
      'update_error' => 'Det gick inte att uppdatera det här kontot. Var god försök igen.',
    ],
    'transactions' => [
      'already_exists' => 'Den transaktionen finns redan. Välj ett annat namn.',
      'create_error' => 'Det uppstod ett problem med att skapa denna transaktion. Var god försök igen.',
      'delete_error' => 'Det gick inte att ta bort den här transaktionen. Var god försök igen.',
      'not_found' => 'Den transaktionen finns inte.',
      'update_error' => 'Det gick inte att uppdatera transaktionen. Var god försök igen.',
    ],
    'templates' => [
      'already_exists' => 'Den mallen finns redan. Välj ett annat namn.',
      'create_error' => 'Det uppstod ett problem med att skapa den här mallen. Var god försök igen.',
      'delete_error' => 'Det gick inte att ta bort den här mallen. Var god försök igen.',
      'not_found' => 'Den mallen finns inte.',
      'update_error' => 'Det gick inte att uppdatera den här mallen. Var god försök igen.',
    ],
    'transactioncategories' => [
      'already_exists' => 'Den transaktionskategorin finns redan. Välj ett annat namn.',
      'create_error' => 'Det uppstod ett problem med att skapa denna transaktionskategori. Var god försök igen.',
      'delete_error' => 'Det gick inte att ta bort den här transaktionskategorin. Var god försök igen.',
      'not_found' => 'Den transaktionskategorin finns inte.',
      'update_error' => 'Det uppstod ett problem med att uppdatera denna transaktionskategori. Var god försök igen.',
    ],
    'productvariables' => [
      'already_exists' => 'Den produktvariabeln finns redan. Välj ett annat namn.',
      'create_error' => 'Det uppstod ett problem med att skapa denna produktvariabel. Var god försök igen.',
      'delete_error' => 'Det gick inte att ta bort den här produktvariabeln. Var god försök igen.',
      'not_found' => 'Den produktvariabeln finns inte.',
      'update_error' => 'Det uppstod ett problem med att uppdatera denna produktvariabel. Var god försök igen.',
    ],
    'hrms' => [
      'already_exists' => 'Den Hrm finns redan. Välj ett annat namn.',
      'create_error' => 'Det var problem med att skapa den här Hrm. Var god försök igen.',
      'delete_error' => 'Det gick inte att ta bort den här Hrm. Var god försök igen.',
      'not_found' => 'Den Hrm existerar inte.',
      'update_error' => 'Det uppstod ett problem med att uppdatera den här Hrm. Var god försök igen.',
    ],
    'banks' => [
      'already_exists' => 'Den banken finns redan. Välj ett annat namn.',
      'create_error' => 'Det var ett problem med att skapa denna bank. Var god försök igen.',
      'delete_error' => 'Det gick inte att ta bort banken. Var god försök igen.',
      'not_found' => 'Den banken finns inte.',
      'update_error' => 'Det uppstod ett problem med att uppdatera denna bank. Var god försök igen.',
    ],
    'usergatewayentries' => [
      'already_exists' => 'Den betalningsporten finns redan. Välj ett annat namn.',
      'create_error' => 'Det uppstod ett problem med att skapa denna betalningsport. Var god försök igen.',
      'delete_error' => 'Det gick inte att ta bort den här betalningsgrinden. Var god försök igen.',
      'not_found' => 'Den betalningsporten finns inte.',
      'update_error' => 'Det uppstod ett problem med att uppdatera denna betalningsport. Var god försök igen.',
    ],
    'departments' => [
      'already_exists' => 'Den avdelningen finns redan. Välj ett annat namn.',
      'create_error' => 'Det var ett problem med att skapa denna avdelning. Var god försök igen.',
      'delete_error' => 'Det gick inte att ta bort den här avdelningen. Var god försök igen.',
      'not_found' => 'Den avdelningen finns inte.',
      'update_error' => 'Det uppstod ett problem med att uppdatera den här avdelningen. Var god försök igen.',
    ],
    'quotes' => [
      'already_exists' => 'Den offerten finns redan. Välj ett annat namn.',
      'create_error' => 'Det var ett problem med att skapa den här offerten. Var god försök igen.',
      'delete_error' => 'Det gick inte att ta bort den offerten. Var god försök igen.',
      'not_found' => 'Den offerten finns inte.',
      'update_error' => 'Det uppstod ett problem med att uppdatera denna offert. Var god försök igen.',
    ],
    'purchaseorders' => [
      'already_exists' => 'Den beställningen finns redan. Välj ett annat namn.',
      'create_error' => 'Det uppstod ett problem med att skapa denna inköpsorder. Var god försök igen.',
      'delete_error' => 'Det gick inte att ta bort denna inköpsorder. Var god försök igen.',
      'not_found' => 'Den beställningen finns inte.',
      'update_error' => 'Det gick inte att uppdatera denna inköpsorder. Var god försök igen.',
    ],
    'orders' => [
      'already_exists' => 'Denna order finns redan. Välj ett annat namn.',
      'create_error' => 'Det uppstod ett problem med att skapa denna ordning. Var god försök igen.',
      'delete_error' => 'Det gick inte att ta bort beställningen. Var god försök igen.',
      'not_found' => 'Denna order finns inte.',
      'update_error' => 'Det uppstod ett problem med att uppdatera denna order. Var god försök igen.',
    ],
    'suppliers' => [
      'already_exists' => 'Denna leverantör finns redan. Välj ett annat namn.',
      'create_error' => 'Det var ett problem med att skapa denna leverantör. Var god försök igen.',
      'delete_error' => 'Det gick inte att ta bort denna leverantör. Var god försök igen.',
      'not_found' => 'Leverantören finns inte.',
      'update_error' => 'Det uppstod ett problem med att uppdatera denna leverantör. Var god försök igen.',
    ],
    'tasks' => [
      'already_exists' => 'Den uppgiften finns redan. Välj ett annat namn.',
      'create_error' => 'Det uppstod ett problem med att skapa denna uppgift. Var god försök igen.',
      'delete_error' => 'Det gick inte att ta bort denna uppgift. Var god försök igen.',
      'not_found' => 'Den uppgiften finns inte.',
      'update_error' => 'Det uppstod ett problem med att uppdatera denna uppgift. Var god försök igen.',
    ],
    'tags' => [
      'already_exists' => 'Den taggen finns redan. Välj ett annat namn.',
      'create_error' => 'Det uppstod ett problem med att skapa den här taggen. Var god försök igen.',
      'delete_error' => 'Det gick inte att ta bort taggen. Var god försök igen.',
      'not_found' => 'Den taggen finns inte.',
      'update_error' => 'Det gick inte att uppdatera taggen. Var god försök igen.',
    ],
    'miscs' => [
      'already_exists' => 'Att Misc redan finns. Välj ett annat namn.',
      'create_error' => 'Det uppstod ett problem med att skapa detta Övrigt. Var god försök igen.',
      'delete_error' => 'Det uppstod ett problem med att ta bort detta. Var god försök igen.',
      'not_found' => 'Att Misc inte finns.',
      'update_error' => 'Det uppstod ett problem med att uppdatera detta. Var god försök igen.',
    ],
    'projects' => [
      'already_exists' => 'Det projektet finns redan. Välj ett annat namn.',
      'create_error' => 'Det uppstod ett problem med att skapa detta projekt. Var god försök igen.',
      'delete_error' => 'Det gick inte att ta bort detta projekt. Var god försök igen.',
      'not_found' => 'Det projektet finns inte.',
      'update_error' => 'Det uppstod ett problem med att uppdatera detta projekt. Var god försök igen.',
    ],
    'notes' => [
      'already_exists' => 'Den anteckningen finns redan. Välj ett annat namn.',
      'create_error' => 'Det gick inte att skapa den här anteckningen. Var god försök igen.',
      'delete_error' => 'Det gick inte att ta bort den här anteckningen. Var god försök igen.',
      'not_found' => 'Den anmärkningen finns inte.',
      'update_error' => 'Det uppstod ett problem med att uppdatera denna anteckning. Var god försök igen.',
    ],
    'events' => [
      'already_exists' => 'Den händelsen finns redan. Välj ett annat namn.',
      'create_error' => 'Det var ett problem med att skapa den här händelsen. Var god försök igen.',
      'delete_error' => 'Det gick inte att ta bort den här händelsen. Var god försök igen.',
      'not_found' => 'Den händelsen finns inte.',
      'update_error' => 'Det uppstod ett problem med att uppdatera denna händelse. Var god försök igen.',
    ],
  ],
  'frontend' => [
    'auth' => [
      'confirmation' => 
      [
        'already_confirmed' => 'Ditt konto är redan bekräftat.',
        'confirm' => 'Bekräfta ditt konto!',
        'created_confirm' => 'Ditt konto skapades. Vi har skickat ett e-postmeddelande för att bekräfta ditt konto.',
        'created_pending' => 'Ditt konto skapades framgångsrikt och väntar på godkännande. Ett e-postmeddelande skickas när ditt konto godkänns.',
        'mismatch' => 'Din bekräftelsekod matchar inte.',
        'not_found' => 'Den bekräftelseskoden finns inte.',
        'resend' => 'Ditt konto har inte bekräftats. Klicka på bekräftelselänken i din e-post',
        'success' => 'Ditt konto har bekräftats!',
        'resent' => 'Ett nytt e-postmeddelande har skickats till den adress som finns.',
      ],
      'deactivated' => 'Ditt konto har inaktiverats.',
      'email_taken' => 'Den e-postadressen har redan tagits.',
      'password' => 
      [
        'change_mismatch' => 'Det är inte ditt gamla lösenord.',
      ],
      'registration_disabled' => 'Registreringen är för närvarande stängd.',
    ],
  ],
];