<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Support\SectionClasses;

class Showcase extends Block
{
    public $name = 'Showcase';
    public $description = 'showcase';
    public $slug = 'showcase';
    public $category = 'formatting';
    public $icon = 'images';
    public $keywords = ['showcase', 'realizacja', 'oferta'];
    public $mode = 'edit';
    public $supports = [
        'align' => false,
        'mode' => true,
        'jsx' => true,
    ];

    public function fields()
    {
        $showcase = new FieldsBuilder('showcase');

        $showcase
            ->setLocation('block', '==', 'acf/showcase')
            ->addText('block-title', [
                'label' => 'Tytuł',
                'required' => 0,
            ])
            ->addTab('Treść', ['placement' => 'top'])
            ->addGroup('g_showcase', ['label' => ''])
                ->addText('title', ['label' => 'Tytuł'])
                ->addText('header', ['label' => 'Nagłówek'])
                ->addLink('button1', [
                    'label' => 'Przycisk #1',
                    'return_format' => 'array',
                ])
                ->addPostObject('button1_target', [
                    'label' => 'Cel przycisku #1',
                    'post_type' => ['work', 'offer'],
                    'return_format' => 'id',
                    'ui' => 1,
                    'allow_null' => 1,
                ])
                ->addLink('button2', [
                    'label' => 'Przycisk #2',
                    'return_format' => 'array',
                ])
            ->endGroup()
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
                'ui' => 0,
                'allow_null' => 0,
            ]);

        return $showcase;
    }

    public function with(): array
    {
        $fields = [
            'block_title' => get_field('block-title'),
            'g_showcase' => get_field('g_showcase') ?: [],
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

