<?php

namespace App\Options;

use App\Fields\Partials\ContainerButtons;
use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Options as Field;

class Options extends Field
{
  /**
   * The option page menu name.
   *
   * @var string
   */
  public $name = 'Theme Settings';

  /**
   * The option page menu slug.
   *
   * @var string
   */
  public $slug = 'theme-settings';

  /**
   * The option page document title.
   *
   * @var string
   */
  public $title = 'Theme Settings: General Options for the Theme';

  /**
   * The option page permission capability.
   *
   * @var string
   */
  public $capability = 'edit_theme_options';

  /**
   * The option page menu position.
   *
   * @var int
   */
  public $position = '99';

  /**
   * The option page visibility in the admin menu.
   *
   * @var boolean
   */
  public $menu = true;

  /**
   * The slug of another admin page to be used as a parent.
   *
   * @var string
   */
  public $parent = null;

  /**
   * The option page menu icon.
   *
   * @var string
   */
  public $icon = null;

  /**
   * Redirect to the first child page if one exists.
   *
   * @var boolean
   */
  public $redirect = true;

  /**
   * The post ID to save and load values from.
   *
   * @var string|int
   */
  public $post = 'options';

  /**
   * The option page autoload setting.
   *
   * @var bool
   */
  public $autoload = true;

  /**
   * The additional option page settings.
   *
   * @var array
   */
  public $settings = [];

  /**
   * Localized text displayed on the submit button.
   */
  public function updateButton(): string
  {
    return __('Update', 'acf');
  }

  /**
   * Localized text displayed after form submission.
   */
  public function updatedMessage(): string
  {
    return __('Options Updated', 'acf');
  }

  /**
   * The option page field group.
   * https://github.com/Log1x/acf-builder-cheatsheet
   */
  public function fields(): array
  {
    $options = Builder::make('options');

    //$options->addPartial(ContainerButtons::class);

    $options
      ->addTab('general', [
        'label' => 'General',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => [],
        'wrapper' => [
          'width' => '',
          'class' => '',
          'id' => '',
        ],
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
        'placement' => '',
      ])
      ->addButtonGroup('header_layout_container', [
        'label' => 'Header Container',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => [],
        'wrapper' => [
          'width' => '50%',
          'class' => '',
          'id' => '',
        ],
        'choices' => [
          'container' => 'Simple',
          'fluid-container' => 'Fluid'
        ],
        'allow_null' => 0,
        'default_value' => 'container',
        'layout' => 'horizontal',
        'return_format' => 'value',
      ])
      ->addTrueFalse('layout_hide_title', [
        'label' => 'Hide Title',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => [],
        'wrapper' => [
          'width' => '50%',
          'class' => '',
          'id' => '',
        ],
        'message' => '',
        'default_value' => 0,
        'ui' => 0,
        'ui_on_text' => '',
        'ui_off_text' => '',
      ])
      ->addImage('header_image', [
        'label' => 'Header Image',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => [],
        'wrapper' => [
          'width' => '40%',
          'class' => '',
          'id' => '',
        ],
        'return_format' => 'ID',
        'preview_size' => 'thumbnail',
        'library' => 'all',
        'min_width' => '',
        'min_height' => '',
        'min_size' => '',
        'max_width' => '',
        'max_height' => '',
        'max_size' => '',
        'mime_types' => '',
      ])
      ->addColorPicker('header_overlay_colour', [
        'label' => 'Header overlay colour',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => [],
        'enable_opacity' => 0,
        'return_format' => 'string',
        'wrapper' => [
          'width' => '30%',
          'class' => '',
          'id' => '',
        ],
        'default_value' => '',
      ])
      ->addRange('header_overlay_opacity', [
        'label' => 'Overay opacity',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => [],
        'wrapper' => [
          'width' => '30%',
          'class' => '',
          'id' => '',
        ],
        'default_value' => '',
        'min' => '0',
        'max' => '1',
        'step' => '0.01',
        'prepend' => '',
        'append' => '',
      ]);

    $options
      ->addPartial(ContainerButtons::class);




    $options
      ->addButtonGroup('footer_layout_container', [
        'label' => 'Footer Container',
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
          'fluid-container' => 'Fluid'
        ],
        'allow_null' => 0,
        'default_value' => 'container',
        'layout' => 'horizontal',
        'return_format' => 'value',
      ]);

    // $options
    //   ->addTab('home', [
    //     'label' => 'Homepage',
    //     'instructions' => '',
    //     'required' => 0,
    //     'conditional_logic' => [],
    //     'wrapper' => [
    //       'width' => '',
    //       'class' => '',
    //       'id' => '',
    //     ],
    //     'default_value' => '',
    //     'placeholder' => '',
    //     'prepend' => '',
    //     'append' => '',
    //     'maxlength' => '',
    //     'placement' => '',
    //   ])
    //   ->addGallery('flash_images', [
    //     'label' => 'Flash images',
    //     'instructions' => '',
    //     'required' => 0,
    //     'conditional_logic' => [],
    //     'wrapper' => [
    //         'width' => '',
    //         'class' => '',
    //         'id' => '',
    //     ],
    //     'return_format' => 'ID',
    //     'min' => '',
    //     'max' => '',
    //     'insert' => 'append',
    //     'library' => 'all',
    //     'min_width' => '',
    //     'min_height' => '',
    //     'min_size' => '',
    //     'max_width' => '',
    //     'max_height' => '',
    //     'max_size' => '',
    //     'mime_types' => '',
    //   ]);

    return $options->build();
  }
}
