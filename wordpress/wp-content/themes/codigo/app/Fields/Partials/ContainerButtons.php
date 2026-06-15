<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Partial;

class ContainerButtons extends Partial
{
	/**
	 * The partial field group.
	 */
	public function fields(): Builder
	{
		$containerButtons = Builder::make('container_buttons');

		$containerButtons
			->addButtonGroup('layout_container', [
				'label' => 'Layout Container',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => [],
				'wrapper' => [
					'width' => '',
					'class' => '',
					'id' => '',
				],
				'choices' => [
					'container' => 'Simple',
					'container-fluid' => 'Fluid'
				],
				'allow_null' => 0,
				'default_value' => 'container',
				'layout' => 'horizontal',
				'return_format' => 'value',
			]);

		return $containerButtons;
	}
}
