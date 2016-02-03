<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('training')->insert([
            ['name' => 'Developer Startup'],
            ['name' => 'Developer Advanced'],
            ['name' => 'Template Startup'],
            ['name' => 'Template Advanced']
        ]);

        DB::table('exam')->insert([
            ['training_id' => 1, 'date_start' => '2016-01-17', 'date_end' => null, 'completed_at' => '2016-01-17 16:52:21'],
            ['training_id' => 1, 'date_start' => '2016-02-14', 'date_end' => null, 'completed_at' => null],
            ['training_id' => 1, 'date_start' => '2016-03-21', 'date_end' => null, 'completed_at' => null],
            ['training_id' => 2, 'date_start' => '2016-02-15', 'date_end' => '2016-02-16', 'completed_at' => null],
        ]);

        DB::table('question')->insert([
            ['training_id' => 1, 'text' => 'Wie können Daten dem Template zugewiesen werden?'],
            ['training_id' => 1, 'text' => 'Wo ist der Unterschied zwischen einem Interface und einer Abstrakten Klasse?'],
            ['training_id' => 1, 'text' => 'Wo liegen die Shopware-Controller?'],
            ['training_id' => 1, 'text' => 'Wo liegen die Shopware-Models?'],
            ['training_id' => 1, 'text' => 'Wie greifen Sie <b>richtig</b> auf die Datenbank zu?'],
            ['training_id' => 1, 'text' => 'Wie werden Template-Erweiterungen in einem Plugin oder Controller geladen?'],
            ['training_id' => 1, 'text' => 'Wie wird in der install-Methode eines Plugins ein Konfigurationsformular erzeugt?'],
            ['training_id' => 1, 'text' => 'Von welchem Controller leitet ein Frontend-Controller ab?'],
            ['training_id' => 1, 'text' => 'Von welcher Klasse leiten die neuen Backend-Controller ab? (Neue Standard-Komponenten)'],
            ['training_id' => 1, 'text' => 'Wie kann in einem Template ein weiterer SubRequest gerendert werden?'],
            ['training_id' => 1, 'text' => 'Wie werden in ExtJS Klassen <b>definiert</b>?'],
            ['training_id' => 1, 'text' => 'Wie wird in einer Plugin install-Methode <b>richtig</b> ein Event registriert?'],
            ['training_id' => 1, 'text' => 'Welche Argumente werden einem Event-Listener übergeben?'],
            ['training_id' => 1, 'text' => 'Warum sollte eher ein Event statt eines Hooks verwendet werden?'],
            ['training_id' => 1, 'text' => 'Welche Event-Typen gibt es?'],
            ['training_id' => 1, 'text' => 'Unter welchem Namespace stehen die API Ressourcen?'],
            ['training_id' => 1, 'text' => 'Wo ist der Unterschied zwischen INNER JOIN und LEFT JOIN'],
            ['training_id' => 1, 'text' => 'Was ist der optimale Weg für eine Erweiterung der sGetArticleById der Klasse sArticles?'],
        ]);

        DB::table('answer')->insert([
            ['question_id' => 1, 'isCorrect' => true, 'text' => '$view->assign(\'name\', $name)'],
            ['question_id' => 1, 'isCorrect' => false, 'text' => '$view->add(\'name\', $name)'],
            ['question_id' => 1, 'isCorrect' => false, 'text' => '$view->addVar(\'name\', $name)'],
            ['question_id' => 1, 'isCorrect' => true, 'text' => '$view->name = $name'],

            ['question_id' => 2, 'isCorrect' => true, 'text' => 'Abstrakte Klassen können vollständige Funktionen implementieren, Interfaces definieren nur die Funktionsrümpfe'],
            ['question_id' => 2, 'isCorrect' => false, 'text' => 'Interfaces können direkt instanziert werden, Abstrakte Klassen nicht'],
            ['question_id' => 2, 'isCorrect' => true, 'text' => 'Eine Klasse kann mehrere Interfaces implementieren, jedoch nur von einer Abstrakten Klasse direkt ableiten'],
            ['question_id' => 2, 'isCorrect' => false, 'text' => 'Abstrakte Klassen müssen immer als Final definiert sein'],

            ['question_id' => 3, 'isCorrect' => false, 'text' => 'Shopware/classes/Controllers'],
            ['question_id' => 3, 'isCorrect' => true, 'text' => 'engine/Shopware/Controllers'],
            ['question_id' => 3, 'isCorrect' => false, 'text' => 'engine/core/controllers'],
            ['question_id' => 3, 'isCorrect' => false, 'text' => 'engine/Shopware/Plugin/Controllers'],

            ['question_id' => 4, 'isCorrect' => false, 'text' => 'core/class/models'],
            ['question_id' => 4, 'isCorrect' => false, 'text' => 'engine/Models'],
            ['question_id' => 4, 'isCorrect' => false, 'text' => 'Shopware/Doctrine/Models'],
            ['question_id' => 4, 'isCorrect' => true, 'text' => 'engine/Shopware/Models'],

            ['question_id' => 5, 'isCorrect' => true, 'text' => 'Shopware()->Db()'],
            ['question_id' => 5, 'isCorrect' => false, 'text' => '$this->sSystem->sDB_CONNECTION'],
            ['question_id' => 5, 'isCorrect' => false, 'text' => 'Shopware()->DatabaseConnection()'],
            ['question_id' => 5, 'isCorrect' => false, 'text' => '$db = new Enlight_Components_Db_Adapter_Pdo_Mysql()'],

            ['question_id' => 6, 'isCorrect' => true, 'text' => 'Automatisch, über die richtige Ordnerstruktur'],
            ['question_id' => 6, 'isCorrect' => false, 'text' => '$view->extends()'],
            ['question_id' => 6, 'isCorrect' => true, 'text' => '$view->loadTemplate()'],
            ['question_id' => 6, 'isCorrect' => false, 'text' => '$view->load()'],

            ['question_id' => 7, 'isCorrect' => false, 'text' => '$this->createConfig()'],
            ['question_id' => 7, 'isCorrect' => false, 'text' => '$this->Config()'],
            ['question_id' => 7, 'isCorrect' => false, 'text' => '$this->createPluginForm()'],
            ['question_id' => 7, 'isCorrect' => true, 'text' => '$this->Form()'],

            ['question_id' => 8, 'isCorrect' => false, 'text' => 'Shopware_Controller_Frontend'],
            ['question_id' => 8, 'isCorrect' => false, 'text' => 'Shopware_Controller_Backend_Application'],
            ['question_id' => 8, 'isCorrect' => true, 'text' => 'Enlight_Controller_Action'],
            ['question_id' => 8, 'isCorrect' => false, 'text' => 'Enlight_Frontend_Controller_Default'],

            ['question_id' => 9, 'isCorrect' => false, 'text' => 'Enlight_Backend_Controller'],
            ['question_id' => 9, 'isCorrect' => false, 'text' => 'Shopware_Controller_Backend'],
            ['question_id' => 9, 'isCorrect' => true, 'text' => 'Shopware_Controllers_Backend_Application'],
            ['question_id' => 9, 'isCorrect' => false, 'text' => 'Shopware_Backend_Controller'],

            ['question_id' => 10, 'isCorrect' => false, 'text' => '{render module=“widgets“ controller=“emotion“ action=“index“}'],
            ['question_id' => 10, 'isCorrect' => false, 'text' => '{request module=“widgets“ controller=“emotion“ action=“index“}'],
            ['question_id' => 10, 'isCorrect' => true, 'text' => '{action module=“widgets“ controller=“emotion“ action=“index“}'],
            ['question_id' => 10, 'isCorrect' => false, 'text' => '{subrequest module=“widgets“ controller=“emotion“ action=“index“}'],

            ['question_id' => 11, 'isCorrect' => false, 'text' => 'Ext.create()'],
            ['question_id' => 11, 'isCorrect' => false, 'text' => 'Ext.defineClass()'],
            ['question_id' => 11, 'isCorrect' => true, 'text' => 'Ext.define()'],
            ['question_id' => 11, 'isCorrect' => false, 'text' => 'Ext.prototype()'],

            ['question_id' => 12, 'isCorrect' => false, 'text' => '$this->createEvent()'],
            ['question_id' => 12, 'isCorrect' => true, 'text' => '$this->subscribeEvent()'],
            ['question_id' => 12, 'isCorrect' => false, 'text' => '$this->Event()->create()'],
            ['question_id' => 12, 'isCorrect' => false, 'text' => 'INSERT INTO s_core_plugin_subscribe (...)'],

            ['question_id' => 13, 'isCorrect' => true, 'text' => 'Enlight_Event_EventArgs'],
            ['question_id' => 13, 'isCorrect' => false, 'text' => 'Shopware_Event_Args'],
            ['question_id' => 13, 'isCorrect' => false, 'text' => 'Enlight_Args'],
            ['question_id' => 13, 'isCorrect' => false, 'text' => 'Array'],

            ['question_id' => 14, 'isCorrect' => true, 'text' => 'Weil Sie sich mit Hooks an die konkrete Implementierung einzelner Methoden binden, die sich bei Bugfixes durchaus ändern kann.'],
            ['question_id' => 14, 'isCorrect' => false, 'text' => 'Es sollte immer eher ein Hook verwendet werden, da diese schneller sind'],
            ['question_id' => 14, 'isCorrect' => true, 'text' => 'Events werden durch Shopware – wenn möglich – updatesicher gehalten'],
            ['question_id' => 14, 'isCorrect' => false, 'text' => 'Weil Events sich auf jeder Klasse registrieren lassen, die das Enlight_Event_Interface implementieren'],

            ['question_id' => 15, 'isCorrect' => true, 'text' => 'notify, notifyUntil, filter'],
            ['question_id' => 15, 'isCorrect' => false, 'text' => 'throw, filter, notify'],
            ['question_id' => 15, 'isCorrect' => false, 'text' => 'filter, calculate, notify'],
            ['question_id' => 15, 'isCorrect' => false, 'text' => 'append, filter, notifyUntil'],

            ['question_id' => 16, 'isCorrect' => false, 'text' => 'Shopware()->Api()'],
            ['question_id' => 16, 'isCorrect' => true, 'text' => 'Shopware\Components\Api\Resource'],
            ['question_id' => 16, 'isCorrect' => false, 'text' => 'Shopware\core\api'],
            ['question_id' => 16, 'isCorrect' => false, 'text' => 'Shopware\engine\Components'],

            ['question_id' => 17, 'isCorrect' => true, 'text' => 'Beim INNER JOIN werden nur Daten selektiert, deren Verknüpfungsbedingung zutrifft'],
            ['question_id' => 17, 'isCorrect' => true, 'text' => 'Durch einen LEFT JOIN werden auch Daten selektiert, die keinen verknüpften Datensatz in der referenzierten Tabelle besitzen'],
            ['question_id' => 17, 'isCorrect' => false, 'text' => 'Zwischen LEFT und INNER JOIN gibt es keinen Unterschied'],
            ['question_id' => 17, 'isCorrect' => false, 'text' => 'Mit INNER JOIN verknüpfte Daten können nicht mit einem ORDER BY sortiert werden'],

            ['question_id' => 18, 'isCorrect' => false, 'text' => 'Implementierung eines Plugin-Hooks für diese Funktionen'],
            ['question_id' => 18, 'isCorrect' => true, 'text' => 'Das vorhandene Event der sGetArticleById-Methode verwenden'],
            ['question_id' => 18, 'isCorrect' => false, 'text' => 'Die Methode im Quellcode direkt modifizieren'],
            ['question_id' => 18, 'isCorrect' => false, 'text' => 'Eine eigene Klasse schreiben, die die Properties der Klasse sArticles erbt'],
        ]);

        for ($x = 1; $x < rand(18,22); $x++) {
            $id = $x;

            DB::table('attendee')->insert([
                'firstname' => str_random(5),
                'lastname' => str_random(9),
                'company' => ((rand(1,10) % 2) ? str_random(10) : '')
            ]);

            DB::table('exam_attendee')->insert([
                'attendee_id' => $id,
                'exam_id' => 1,
                'login' => str_random(6)
            ]);

            for ($y = 1; $y < 19; $y++) {
                DB::table('exam_attendee_question')->insert([
                    'exam_attendee_id' => $id,
                    'question_id' => $y
                ]);
            }

        }


    }
}
