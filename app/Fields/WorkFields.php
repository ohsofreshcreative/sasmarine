<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class WorkFields extends Field
{
	public function fields(): array
	{
		$work = new FieldsBuilder('work_fields', [
			'title' => 'Dane realizacji',
			'style' => 'seamless',
			'position' => 'side',
		]);

		$work
			->setLocation('post_type', '==', 'work')
			->addText('ship_name', [
				'label' => 'Nazwa statku',
				'instructions' => 'Podaj nazwę jednostki.',
				'required' => 0,
			])
			->addText('imo', [
				'label' => 'IMO',
				'instructions' => 'Podaj numer IMO.',
				'required' => 0,
			])
			->addText('unit_type', [
				'label' => 'Typ jednostki',
				'instructions' => 'Podaj typ jednostki.',
				'required' => 0,
			])
			->addText('realization_place', [
				'label' => 'Miejsce realizacji',
				'instructions' => 'Podaj miasto lub port realizacji.',
				'required' => 0,
			])
			->addImage('work_icon', [
				'label' => 'Ikona realizacji',
				'instructions' => 'Dodaj ikonę wyświetlaną przy realizacji.',
				'return_format' => 'array',
				'preview_size' => 'thumbnail',
				'allow_null' => 1,
			]);

		return [$work];
	}
}
