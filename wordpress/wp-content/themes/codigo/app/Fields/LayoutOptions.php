<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;
use Override;

class LayoutOptions extends Field
{
	/**
	 * The field group.
	 * https://github.com/Log1x/acf-builder-cheatsheet
	 */
	public function fields(): array
	{
		$layoutOptions = Builder::make(
			'layout_options',
			['position' => 'side']
		);

		$layoutOptions
			->setLocation('post_type', '==', 'page')
			->or('post_type', '==', 'post');


		$layoutOptions
			->addSelect('override_layout_hide_title', [
				'label' => 'Hide title',
				'instructions' => 'Overrides the general hide title option',
				'required' => 0,
				'conditional_logic' => [],
				'wrapper' => [
					'width' => '',
					'class' => '',
					'id' => '',
				],
				'choices' => [
					'yes' => 'Yes',
					'no' => 'No',
				],
				'allow_null' => 1,
				'multiple' => 0,
				'ui' => 0,
				'return_format' => 'value',
				'ajax' => 0,
				'placeholder' => '',
			])
			->addSelect('override_layout_container', [
				'label' => 'Container option',
				'instructions' => 'Overrides the general container option',
				'required' => 0,
				'conditional_logic' => [],
				'wrapper' => [
					'width' => '',
					'class' => '',
					'id' => '',
				],
				'choices' => [
					'container' => 'Container',
					'container-fluid' => 'Container Fluid',
				],
				'allow_null' => 1,
				'multiple' => 0,
				'ui' => 0,
				'return_format' => 'value',
				'ajax' => 0,
				'placeholder' => '',
			])
			->addTrueFalse('header_image', [
				'label' => 'Show featured image in the header',
			]);


		return $layoutOptions->build();
	}
}
