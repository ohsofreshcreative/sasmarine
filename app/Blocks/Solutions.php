<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Support\SectionClasses;

class Solutions extends Block
{
	public $name = 'Slider - Realizacje';
	public $description = 'solutions - slider z realizacjami';
	public $slug = 'solutions';
	public $category = 'formatting';
	public $icon = 'image-flip-horizontal';
	public $keywords = ['solutions', 'oferta'];
	public $mode = 'edit';
	public $supports = [
		'align' => false,
		'mode' => true,
		'jsx' => true,
	];

	public function fields()
	{
		$solutions = new FieldsBuilder('solutions');

		$solutions
			->setLocation('block', '==', 'acf/solutions')

			->addText('block-title', [
				'label' => 'Tytuł',
				'required' => 0,
			])

			->addTab('Treści', ['placement' => 'top'])

			->addText('title', [
				'label' => 'Tytuł',
			])

			->addText('solutions_title', [
				'label' => 'Nagłówek',
			])

			->addRepeater('slides', [
				'label' => 'Realizacje',
				'layout' => 'block',
				'button_label' => 'Dodaj realizację',
			])

				->addImage('image', [
					'label' => 'Zdjęcie',
					'return_format' => 'array',
				])

				->addImage('icon', [
					'label' => 'Ikona',
					'return_format' => 'array',
				])

				->addText('slide_title', [
					'label' => 'Tytuł',
				])

				->addTextarea('excerpt', [
					'label' => 'Opis',
				])

				->addLink('button', [
					'label' => 'Przycisk',
				])

			->endRepeater()

			->addTab('Ustawienia bloku', ['placement' => 'top'])

			->addText('section_id', [
				'label' => 'ID',
			])

			->addText('section_class', [
				'label' => 'Dodatkowe klasy CSS',
			])

			->addTrueFalse('nomt', [
				'label' => 'Usunięcie marginesu górnego',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])

			->addTrueFalse('bgshape', [
				'label' => 'Kształt w tle',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])

			->addSelect('background', [
				'label' => 'Kolor tła',
				'choices' => [
					'none'             => 'Brak (domyślne)',
					'section-white'    => 'Białe',
					'section-light'    => 'Jasne',
					'section-gray'     => 'Szare',
					'section-brand'    => 'Marki',
					'section-gradient' => 'Gradient',
					'section-dark'     => 'Ciemne',
				],
				'default_value' => 'none',
				'ui' => 0,
				'allow_null' => 0,
			]);

		return $solutions;
	}

	public function with(): array
	{
		$slides = [];

		foreach (get_field('slides') ?: [] as $row) {
			$slides[] = [
				'title'      => $row['slide_title'] ?? '',
				'excerpt'    => $row['excerpt'] ?? '',

				'url'        => $row['button']['url'] ?? '',
				'button'     => $row['button']['title'] ?? 'Więcej',

				'image_url'  => $row['image']['url'] ?? '',
				'image_alt'  => $row['image']['alt'] ?? '',

				'icon_url'   => $row['icon']['url'] ?? '',
				'icon_alt'   => $row['icon']['alt'] ?? '',
			];
		}

		$fields = [
			'slides'           => $slides,
			'title'            => get_field('title'),
			'solutions_title'  => get_field('solutions_title'),
			'section_id'       => get_field('section_id'),
			'section_class'    => get_field('section_class'),
			'nomt'             => (bool) get_field('nomt'),
			'bgshape'          => (bool) get_field('bgshape'),
			'background'       => get_field('background') ?: 'none',
		];

		$fields['sectionClass'] = SectionClasses::fromMap($fields, [
			'nomt' => '!mt-0',
		]);

		return $fields;
	}
}