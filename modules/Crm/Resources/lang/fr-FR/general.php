<?php

return [

    'name'                  => 'CRM',
    'description'           => 'Surveiller et analyser chaque étape du parcours client',

    'contacts'              => 'Contact|Contacts',
    'companies'             => 'Entreprise|Entreprises',
    'activities'            => 'Activité|Activités',
    'deals'                 => 'Affaire|Affaires',
    'logs'                  => 'Journal|Journaux',
    'notes'                 => 'Note|Notes',
    'tasks'                 => 'Tâche|Tâches',
    'emails'                => 'E-mail|E-mails',
    'schedules'             => 'Planification|Planifications',
    'information'           => 'Information',
    'owner'                 => 'Propriétaire',
    'users'                 => 'Utilisateurs',
    'mobile'                => 'Mobile',
    'agents'                => 'Agent|Agents',
    'fax_number'            => 'N° de fax',
    'source'                => 'Source',
    'birthday_at'           => 'Date de naissance',
    'log_activity'          => 'Journaliser l activité',
    'schedule'              => 'Planifier',
    'task'                  => 'Tâche',
    'note'                  => 'Note',
    'email'                 => 'E-mail',
    'log'                   => 'Journal',
    'schedule_type'         => ':type Planification',
    'task_type'             => ':type Tâche',
    'note_type'             => ':type Note',
    'email_type'            => ':type E-Mail',
    'logs_type'             => ':type Journal',
    'activity'              => 'Activité',
    'activity_description'  => 'Rapport d activité pour CRM',
    'growth'                => 'Croissance',
    'growth_description'    => 'Rapport de croissance pour CRM',
    'body'                  => 'Tapez le corps de votre e-mail...',
    'subject'               => 'Objet',
    'time'                  => 'Heure',
    'start_time'            => 'Heure de début',
    'end_time'              => 'Heure de fin',
    'start_date'            => 'Date de début',
    'end_date'              => 'Date de fin',
    'deal_value'            => 'Montant de l affaire',
    'close_date'            => 'Date de réalisation espérée',
    'closed_at'             => 'Fermée le',
    'duration'              => 'Durée',
    'assigned'              => 'Assignée',
    'mark_as_done'          => 'Marquer comme Terminée',
    'add_activity'          => 'Ajouter une activité',
    'take_notes'            => 'Prendre des notes',
    'done'                  => 'Fait',
    'field_title'           => 'Titre',
    'open_activities'       => 'Ouvrir une activité|Ouvrir des activités',
    'competitors'           => 'Concurrent|Concurrents',
    'strengths'             => 'Forces',
    'weaknesses'            => 'Faiblesses',
    'deal_activities'       => 'Activités de l affaire',
    'add_activity_type'     => 'Ajouter un nouveau type d’activité',
    'edit_activity_type'    => 'Modification type d activité',
    'add_stage'             => 'Ajouter une nouvelle étape',
    'add_pipeline'          => 'Ajouter un nouveau pipeline',
    'won'                   => 'Gagné',
    'lost'                  => 'Perdu',
    'trash'                 => 'Corbeille',
    'reopen'                => 'Réouvrir',
    'pipeline'              => 'Pipeline',
    'count'                 => 'Compteur',
    'open'                  => 'Ouvrir',
    'life_stage'            => 'Étape de vie',
    'edit_stage'            => 'Modifier l étape',
    'add_company'           => 'Ajouter une entreprise',
    'add_contact'           => 'Ajouter un contact',
    'link_crm'              => 'Lier à la CRM?',
    'type'                  => 'Type',
    'contact'               => 'Contact|Contacts',
    'company'               => 'Entreprise|Entreprises',
    'born_date'             => 'Date de naissance',
    'deal_status_change'    => 'Statut de l affaire modifié !',
    'pipeline_stage_change' => 'Phase du pipeline changée !',
    'activity_type_change'  => 'Type d activité modifié !',
    'invoice_created'       => 'Facture créée',
    'deal_is_broken'        => 'L affaire est rompue',
    'deal_is_reopen'        => 'L affaire est rouverte',
    'send_mail'             => 'Le courrier a été envoyé avec succès',

    'stage' => [
        'customer'          => 'Client',
        'lead'              => 'Prospect',
        'opportunity'       => 'Opportunité',
        'subscriber'        => 'Abonné',
        'title'             => 'Phase',
        'not_change'        => 'Ne pas changer'
    ],

    'sources' => [
        'advert'             => 'Annonce',
        'chat'               => 'Discussion',
        'contact_form'       => 'Formulaire de contact',
        'employee_referral'  => 'Recommandation d employé',
        'external_referral'  => 'Recommandation externe',
        'marketing_campaign' => 'Campagne de marketing',
        'newsletter'         => 'Newsletter',
        'online_store'       => 'Boutique en ligne',
        'optin_form'         => 'Formulaire d inscription',
        'partner'            => 'Partenaire',
        'phone'              => 'Appel téléphonique',
        'public_relations'   => 'Relations publiques',
        'sales_mail_alias'   => 'Alias E-Mail de vente',
        'search_engine'      => 'Moteur de recherche',
        'seminar_internal'   => 'Séminaire interne',
        'seminar_partner'    => 'Partenaire du séminaire',
        'social_media'       => 'Réseaux sociaux',
        'trade_show'         => 'Salon',
        'web_download'       => 'Téléchargement Web',
        'web_research'       => 'Recherche Web'
    ],

    'log_type' => [
        'call'              => 'Enregistrer un appel',
        'meeting'           => 'Enregistrer une réunion',
        'email'             => 'Enregistrer un E-Mail',
        'sms'               => 'Enregistrer un SMS'
    ],

    'schedules_type' => [
        'call'              => 'Planifier un appel',
        'meeting'           => 'Planifier une réunion',
    ],

    'report' => [
        'activity_report'   => 'Rapport d activité',
        'growth_report'     => 'Rapport de croissance'
    ],

    'message' => [
       'disable_code'       => 'Avertissement : Vous n’êtes pas autorisé à désactiver <b>:name</b> parce qu’il est associé à :texte.',
       'addednote'          => 'Note ajoutée !',
    ],

    'modal' => [
        'title'             => 'Afficher :field',

        'delete' => [
            'title'         => 'Supprimer l activité',
            'message'       => 'Êtes-vous sûr ?',
        ],

        'edit' => [
            'title'         => 'Modifier :field',
        ],
    ],

    'activity_types' => [
        'call'              => 'Appel',
        'meeting'           => 'Réunion',
        'dead_line'         => 'Date limite',
        'email'             => 'E-mail',
    ],

    'pipeline_stages' => [
        'proposal_made'         => 'Proposition faite',
        'lead_in'               => 'Prospect entré',
        'contact_made'          => 'Prise de contact',
        'demo_scheduled'        => 'Démo programmée',
        'negotitions_started'   => 'Négociations débutées',
    ],

    'empty' => [
        'contacts'              => 'La gestion de la relation client vous permet de surveiller et d analyser chaque étape du 
                                    parcours client. Des contacts sont requis si vous souhaitez créer une transaction ou une activité.',
        'companies'             => 'La gestion de la relation client vous permet de surveiller et d analyser chaque étape du 
                                    parcours client. Afin de créer les transactions et d enregistrer les activités, vous devez créer 
                                    des entreprises. Ainsi, vous pouvez gérer des prospects qualifiés et non qualifiés, suivre les 
                                    opportunités ouvertes et fermées, et analysez les gains et les pertes du client pour une prévision précise dans votre pipeline de ventes.'
    ],

    'form_description' => [
        'general'           => 'Ici vous pouvez entrer les informations générales du client telles que le nom, l email, etc.',
    ],
];
