<?php

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Css_Filter;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Text_Stroke;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

class Elementor_Our_Team_Widget extends \Elementor\Widget_Base
{


    public function get_name()
    {
        return 'ourteam-box';
    }

    public function get_title()
    {
        return esc_html__('Our Team Box', 'ourteam');
    }

    public function get_icon()
    {
        return 'eicon-image-box';
    }

    public function get_keywords()
    {
        return [ 'image', 'photo', 'visual','team', 'box' ];
    }
    public function get_categories()
    {
        return [ 'basic' ];
    }

//    Register controls

    protected function register_controls()
    {
        $this->start_controls_section(
            'section_image',
            [
                'label' => esc_html__('Our Team Box', 'ourteam'),
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__('Choose Image', 'ourteam'),
                'type' => Controls_Manager::MEDIA,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
                'default' => 'full',
                'separator' => 'none',
                'condition' => [
                    'image[url]!' => '',
                ],
            ]
        );

        $this->add_control(
            'title_text',
            [
                'label' => esc_html__('Title', 'elementor'),
                'type' => Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => esc_html__('Team Member', 'elementor'),
                'placeholder' => esc_html__('Enter your team member name', 'elementor'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'description_text',
            [
                'label' => esc_html__('Description', 'ourteam'),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'ourteam'),
                'placeholder' => esc_html__('Enter your description', 'ourteam'),
                'separator' => 'none',
                'rows' => 10,
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => esc_html__('Link', 'ourteam'),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'title_size',
            [
                'label' => esc_html__('Title HTML Tag', 'ourteam'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => 'H1',
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                    'h5' => 'H5',
                    'h6' => 'H6',
                    'div' => 'div',
                    'span' => 'span',
                    'p' => 'p',
                ],
                'default' => 'h6',
            ]
        );

        $this->add_control(
            'view',
            [
                'label' => esc_html__('View', 'ourteam'),
                'type' => Controls_Manager::HIDDEN,
                'default' => 'traditional',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_box',
            [
                'label' => esc_html__('Box', 'ourteam'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'position',
            [
                'label' => esc_html__('Image Position', 'ourteam'),
                'type' => Controls_Manager::CHOOSE,
                'default' => 'top',
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'ourteam'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'top' => [
                        'title' => esc_html__('Top', 'ourteam'),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'ourteam'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'prefix_class' => 'elementor-position-',
                'toggle' => false,
                'condition' => [
                    'image[url]!' => '',
                ],
            ]
        );

        $this->add_control(
            'content_vertical_alignment',
            [
                'label' => esc_html__('Vertical Alignment', 'ourteam'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'top' => [
                        'title' => esc_html__('Top', 'ourteam'),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'middle' => [
                        'title' => esc_html__('Middle', 'ourteam'),
                        'icon' => 'eicon-v-align-middle',
                    ],
                    'bottom' => [
                        'title' => esc_html__('Bottom', 'ourteam'),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'default' => 'top',
                'toggle' => false,
                'prefix_class' => 'elementor-vertical-align-',
                'condition' => [
                    'position!' => 'top',
                ],
            ]
        );

        $this->add_responsive_control(
            'text_align',
            [
                'label' => esc_html__('Alignment', 'ourteam'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'ourteam'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'ourteam'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'ourteam'),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__('Justified', 'ourteam'),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-our-team-box-wrapper' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_image',
            [
                'label' => esc_html__('Image', 'ourteam'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'image[url]!' => '',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_space',
            [
                'label' => esc_html__('Spacing', 'ourteam'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
                'default' => [
                    'size' => 15,
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}.elementor-position-right .elementor-our-team-box-img' => 'margin-left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}}.elementor-position-left .elementor-our-team-box-img' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}}.elementor-position-top .elementor-our-team-box-img' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    '(mobile){{WRAPPER}} .elementor-our-team-box-img' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_size',
            [
                'label' => esc_html__('Width', 'ourteam') . ' (%)',
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 30,
                    'unit' => '%',
                ],
                'tablet_default' => [
                    'unit' => '%',
                ],
                'mobile_default' => [
                    'unit' => '%',
                ],
                'size_units' => [ '%' ],
                'range' => [
                    '%' => [
                        'min' => 5,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-our-team-box-wrapper .elementor-our-team-box-img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'image_border',
                'selector' => '{{WRAPPER}} .elementor-our-team-box-img img',
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'image_border_radius',
            [
                'label' => esc_html__('Border Radius', 'ourteam'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'separator' => 'after',
                'selectors' => [
                    '{{WRAPPER}} .elementor-our-team-box-img img' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'hover_animation',
            [
                'label' => esc_html__('Hover Animation', 'ourteam'),
                'type' => Controls_Manager::HOVER_ANIMATION,
            ]
        );

        $this->start_controls_tabs('image_effects');

        $this->start_controls_tab(
            'normal',
            [
                'label' => esc_html__('Normal', 'ourteam'),
             ]
        );

        $this->add_group_control(
            Group_Control_Css_Filter::get_type(),
            [
                'name' => 'css_filters',
                'selector' => '{{WRAPPER}} .elementor-our-team-box-img img',
            ]
        );

        $this->add_control(
            'image_opacity',
            [
                'label' => esc_html__('Opacity', 'ourteam'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 1,
                        'min' => 0.10,
                        'step' => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-our-team-box-img img' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        $this->add_control(
            'background_hover_transition',
            [
                'label' => esc_html__('Transition Duration', 'ourteam'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 0.3,
                ],
                'range' => [
                    'px' => [
                        'max' => 3,
                        'step' => 0.1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-our-team-box-img img' => 'transition-duration: {{SIZE}}s',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'hover',
            [
                'label' => esc_html__('Hover', 'ourteam'),
             ]
        );

        $this->add_group_control(
            Group_Control_Css_Filter::get_type(),
            [
                'name' => 'css_filters_hover',
                'selector' => '{{WRAPPER}}:hover .elementor-our-team-box-img img',
            ]
        );

        $this->add_control(
            'image_opacity_hover',
            [
                'label' => esc_html__('Opacity', 'ourteam'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 1,
                        'min' => 0.10,
                        'step' => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}:hover .elementor-our-team-box-img img' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_content',
            [
                'label' => esc_html__('Content', 'ourteam'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'heading_title',
            [
                'label' => esc_html__('Title', 'ourteam'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'title_bottom_space',
            [
                'label' => esc_html__('Spacing', 'ourteam'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-our-team-box-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Color', 'ourteam'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .elementor-our-team-box-title' => 'color: {{VALUE}};',
                ],
                'global' => [
                    'default' => Global_Colors::COLOR_PRIMARY,
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .elementor-our-team-box-title',
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Stroke::get_type(),
            [
                'name' => 'title_stroke',
                'selector' => '{{WRAPPER}} .elementor-our-team-box-title',
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'title_shadow',
                'selector' => '{{WRAPPER}} .elementor-our-team-box-title',
            ]
        );

        $this->add_control(
            'heading_description',
            [
                'label' => esc_html__('Description', 'ourteam'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => esc_html__('Color', 'ourteam'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .elementor-our-team-box-description' => 'color: {{VALUE}};',
                ],
                'global' => [
                    'default' => Global_Colors::COLOR_TEXT,
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'selector' => '{{WRAPPER}} .elementor-our-team-box-description',
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_TEXT,
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'description_shadow',
                'selector' => '{{WRAPPER}} .elementor-our-team-box-description',
            ]
        );

        $this->end_controls_section();
    }

//     Render Our team box on Frontend

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $has_content = ! Utils::is_empty($settings['title_text']) || ! Utils::is_empty($settings['description_text']);

        $html = '<div class="elementor-our-team-box-wrapper">';

        if (! empty($settings['link']['url'])) {
            $this->add_link_attributes('link', $settings['link']);
        }

        if (! empty($settings['image']['url'])) {
            $image_html = wp_kses_post(Group_Control_Image_Size::get_attachment_image_html($settings, 'thumbnail', 'image'));

            if (! empty($settings['link']['url'])) {
                $image_html = '<a ' . $this->get_render_attribute_string('link') . ' tabindex="-1">' . $image_html . '</a>';
            }

            $html .= '<figure class="elementor-our-team-box-img">' . $image_html . '</figure>';
        }

        if ($has_content) {
            $html .= '<div class="elementor-our-team-box-content">';

            if (! Utils::is_empty($settings['title_text'])) {
                $this->add_render_attribute('title_text', 'class', 'elementor-our-team-box-title');

                $this->add_inline_editing_attributes('title_text', 'none');

                $title_html = $settings['title_text'];

                if (! empty($settings['link']['url'])) {
                    $title_html = '<a ' . $this->get_render_attribute_string('link') . '>' . $title_html . '</a>';
                }

                $html .= sprintf('<%1$s %2$s>%3$s</%1$s>', Utils::validate_html_tag($settings['title_size']), $this->get_render_attribute_string('title_text'), $title_html);
            }

            if (! Utils::is_empty($settings['description_text'])) {
                $this->add_render_attribute('description_text', 'class', 'elementor-our-team-box-description');

                $this->add_inline_editing_attributes('description_text');

                $html .= sprintf('<p %1$s>%2$s</p>', $this->get_render_attribute_string('description_text'), $settings['description_text']);
            }

            $html .= '</div>';
        }

        $html .= '</div>';

        Utils::print_unescaped_internal_string($html);
    }


//    Render Our Team Box in the Editor
    protected function content_template()
    {
        ?>
        <#
        var html = '<div class="elementor-our-team-box-wrapper">';

            if ( settings.image.url ) {
            var image = {
            id: settings.image.id,
            url: settings.image.url,
            size: settings.thumbnail_size,
            dimension: settings.thumbnail_custom_dimension,
            model: view.getEditModel()
            };

            var image_url = elementor.imagesManager.getImageUrl( image );

            var imageHtml = '<img src="' + _.escape( image_url ) + '" class="elementor-animation-' + settings.hover_animation + '" />';

            if ( settings.link.url ) {
            imageHtml = '<a href="' + _.escape( settings.link.url ) + '" tabindex="-1">' + imageHtml + '</a>';
            }

            html += '<figure class="elementor-our-team-box-img">' + imageHtml + '</figure>';
            }

            var hasContent = !! ( settings.title_text || settings.description_text );

            if ( hasContent ) {
            html += '<div class="elementor-our-team-box-content">';

                if ( settings.title_text ) {
                var title_html = settings.title_text,
                titleSizeTag = elementor.helpers.validateHTMLTag( settings.title_size );

                if ( settings.link.url ) {
                title_html = '<a href="' + _.escape( settings.link.url ) + '">' + title_html + '</a>';
                }

                view.addRenderAttribute( 'title_text', 'class', 'elementor-our-team-box-title' );

                view.addInlineEditingAttributes( 'title_text', 'none' );

                html += '<' + titleSizeTag  + ' ' + view.getRenderAttributeString( 'title_text' ) + '>' + title_html + '</' + titleSizeTag  + '>';
            }

            if ( settings.description_text ) {
            view.addRenderAttribute( 'description_text', 'class', 'elementor-our-team-box-description' );

            view.addInlineEditingAttributes( 'description_text' );

            html += '<p ' + view.getRenderAttributeString( 'description_text' ) + '>' + settings.description_text + '</p>';
            }

            html += '</div>';
        }

        html += '</div>';

        print( html );
        #>
        <?php
    }
}
