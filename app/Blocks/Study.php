<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Support\SectionClasses;

class Study extends Block
{
    public $name = 'Kafelki - Spis treści';
    public $description = 'study';
    public $slug = 'study';
    public $category = 'formatting';
    public $icon = 'ellipsis';
    public $keywords = ['study', 'kafelki'];
    public $mode = 'edit';
    public $supports = [
        'align' => false,
        'mode' => true,
        'jsx' => true,
    ];

    public function fields()
    {
        $study = new FieldsBuilder('study');

        $study
            ->setLocation('block', '==', 'acf/study') // ważne!
            ->addText('block-title', [
                'label' => 'Tytuł',
                'required' => 0,
            ])
           
            /*--- TAB #2 ---*/
            ->addTab('Treści - opis', ['placement' => 'top'])
            ->addGroup('g_study', ['label' => ''])
            ->addText('title', [
                'label' => 'Tytuł sekcji',
                'required' => 1,
                'instructions' => 'Tytuł zostanie użyty jako wpis w spisie treści.',
            ])
            ->addText('header', ['label' => 'Nagłówek'])
            ->addWysiwyg('text', [
                'label' => 'Opis',
   		'tabs' => 'all',
				'toolbar' => 'full',
				'media_upload' => true,
            ])
            ->addImage('image', [
                'label' => 'Obraz',
                'return_format' => 'array', // lub 'url', lub 'id'
                'preview_size' => 'thumbnail',
            ])
            ->endGroup()
                        /*--- TAB #3 ---*/
            ->addTab('Treści - karty', ['placement' => 'top'])
            ->addGroup('g_study2', ['label' => ''])
            ->addText('title', [
                'label' => 'Tytuł sekcji',
                'required' => 1,
                'instructions' => 'Tytuł zostanie użyty jako wpis w spisie treści.',
            ])
            ->addText('header', ['label' => 'Nagłówek'])
            ->addWysiwyg('text', [
                'label' => 'Opis',
		'tabs' => 'all',
				'toolbar' => 'full',
				'media_upload' => true,
            ])
                        ->addImage('image', [
                'label' => 'Obraz',
                'return_format' => 'array', // lub 'url', lub 'id'
                'preview_size' => 'thumbnail',
            ])
            ->addRepeater('r_study2', [
                'label' => 'Kafelki',
                'layout' => 'table', // 'row', 'block', albo 'table'
                'min' => 1,
                'button_label' => 'Dodaj kafelek'
            ])
            ->addText('number', [
                'label' => 'Numer',
            ])
            ->addText('title', [
                'label' => 'Nagłówek',
            ])
            ->endRepeater()
            ->endGroup()
/*--- TAB #3 ---*/
            ->addTab('Treści - galeria', ['placement' => 'top'])
            ->addGroup('g_study3', ['label' => ''])
            ->addText('title', [
                'label' => 'Tytuł sekcji',
                'required' => 1,
                'instructions' => 'Tytuł zostanie użyty jako wpis w spisie treści.',
            ])
            ->addText('header', ['label' => 'Nagłówek'])
            ->addWysiwyg('text', [
                'label' => 'Opis',
		'tabs' => 'all',
				'toolbar' => 'full',
				'media_upload' => true,
            ])
            ->addGallery('gallery', [
                'label' => 'Galeria',
                'preview_size' => 'medium',
                'library' => 'all',
                'min' => 1,
                'max' => 10,
            ])
            ->endGroup()


            /*--- USTAWIENIA BLOKU ---*/

            ->addTab('Ustawienia bloku', ['placement' => 'top'])
            ->addText('section_id', [
                'label' => 'ID',
            ])
            ->addText('section_class', [
                'label' => 'Dodatkowe klasy CSS',
            ])
            ->addTrueFalse('flip', [
                'label' => 'Odwrotna kolejność',
                'ui' => 1,
                'ui_on_text' => 'Tak',
                'ui_off_text' => 'Nie',
            ])
            ->addTrueFalse('wide', [
                'label' => 'Szeroka kolumna',
                'ui' => 1,
                'ui_on_text' => 'Tak',
                'ui_off_text' => 'Nie',
            ])
            ->addTrueFalse('nomt', [
                'label' => 'Usunięcie marginesu górnego',
                'ui' => 1,
                'ui_on_text' => 'Tak',
                'ui_off_text' => 'Nie',
            ])
            ->addTrueFalse('gap', [
                'label' => 'Większy odstęp',
                'ui' => 1,
                'ui_on_text' => 'Tak',
                'ui_off_text' => 'Nie',
            ])
            ->addSelect('background', [
                'label' => 'Kolor tła',
                'choices' => [
                    'none' => 'Brak (domyślne)',
                    'section-white' => 'Białe',
                    'section-light' => 'Jasne',
                    'section-gray' => 'Szare',
                    'section-brand' => 'Marki',
                    'section-gradient' => 'Gradient',
                    'section-dark' => 'Ciemne',
                ],
                'default_value' => 'none',
                'ui' => 0, // Ulepszony interfejs
                'allow_null' => 0,
            ]);

        return $study;
    }

    public function with(): array
    {
        $g_study2 = get_field('g_study2') ?: [];
        $fields = [
            'block_title' => get_field('block-title'),
            'g_study' => get_field('g_study') ?: [],
            'r_study' => get_field('r_study') ?: [],
            'g_study2' => $g_study2,
            'r_study2' => is_array($g_study2['r_study2'] ?? null) ? $g_study2['r_study2'] : [],
            'g_study3' => get_field('g_study3') ?: [],

            'section_id' => get_field('section_id'),
            'section_class' => get_field('section_class'),

            'flip' => (bool) get_field('flip'),
            'wide' => (bool) get_field('wide'),
            'nomt' => (bool) get_field('nomt'),
            'gap' => (bool) get_field('gap'),

            'background' => get_field('background') ?: 'none',
        ];

        $fields['sectionClass'] = SectionClasses::fromMap($fields, [
            'flip' => 'order-flip',
            'wide' => 'wide',
            'nomt' => '!mt-0',
            'gap' => 'wider-gap',
        ]);

        return $fields;
    }
}

