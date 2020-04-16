<?php

class Facebook_Page_Plugin_Widget extends WP_Widget {
    // Constructor
    public function __construct(){
        parent::__construct(
            'facebook_page_plugin_widget', // Base ID
            __('Facebook Page Plugin', 'fpp-domain'), // Name
            array('description' => __('Shows a Facebook page plugin in a widget', 'fpp-domain'))
        );
    }

    // Display Widget
    public function widget($args, $instance){
        $data = array();
        $data['page_url'] = esc_attr($instance['page_url']);
        $data['show_timeline'] = esc_attr($instance['show_timeline']);
        $data['adapt_container'] = esc_attr($instance['adapt_container']);
        $data['width'] = esc_attr($instance['width']);
        $data['height'] = esc_attr($instance['height']);
        $data['hide_cover'] = esc_attr($instance['hide_cover']);
        $data['use_small_header'] = esc_attr($instance['use_small_header']);
        $data['show_facepile'] = esc_attr($instance['show_facepile']);

        echo $args['before_widget'];

        echo $args['before_title'];

        echo $instance['title'];

        // Get main content
        echo $this->getPagePlugin($data);

        echo $args['after_title'];

        echo $args['after_widget'];
    }

    // Backend Widget Form
    public function form($instance)
    {
        $this->getAdminForm($instance);
    }

    // Update Values
    public function update($new_instance, $old_instance){
        // process widget options to be saved
        $instance = array();
        $instance['title'] = (!empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title']) : '';
        $instance['page_url'] = (!empty( $new_instance['page_url'] ) ) ? strip_tags( $new_instance['page_url']) : '';
        $instance['show_timeline'] = (!empty( $new_instance['show_timeline'] ) ) ? strip_tags( $new_instance['show_timeline']) : '';
        $instance['width'] = (!empty( $new_instance['width'] ) ) ? strip_tags( $new_instance['width']) : '';
        $instance['height'] = (!empty( $new_instance['height'] ) ) ? strip_tags( $new_instance['height']) : '';
        $instance['show_facepile'] = (!empty( $new_instance['show_facepile'] ) ) ? strip_tags( $new_instance['show_facepile']) : '';
        $instance['use_small_header'] = (!empty( $new_instance['use_small_header'] ) ) ? strip_tags( $new_instance['use_small_header']) : '';
        $instance['hide_cover'] = (!empty( $new_instance['hide_cover'] ) ) ? strip_tags( $new_instance['hide_cover']) : '';
        $instance['adapt_container'] = (!empty( $new_instance['adapt_container'] ) ) ? strip_tags( $new_instance['adapt_container']) : '';

        return $instance;
    }

    // Build Widget Admin Form
    public function getAdminForm($instance){
        // Get Title
        if(isset($instance['title'])){
            $title = $instance['title'];
        } else {
            $title = __('Like Us On Facebook', 'fpp-domain');
        }

        // Get Page URL
        if(isset($instance['page_url'])){
            $page_url = $instance['page_url'];
        } else {
            $page_url = 'https://www.facebook.com/facebook';
        }

        // Get Adapt Container
        if(isset($instance['adapt_container'])){
            $adapt_container = $instance['adapt_container'];
        } else {
            $adapt_container = 'true';
        }

        // Get Width
        if(isset($instance['width'])){
            $width = $instance['width'];
        } else {
            $width = 250;
        }

        // Get Height
        if(isset($instance['height'])){
            $height = $instance['height'];
        } else {
            $height = 500;
        }

        // Get Show Timeline
        if(isset($instance['show_timeline'])){
            $show_timeline = $instance['show_timeline'];
        } else {
            $show_timeline = true;
        }

        // Get Faces
        if(isset($instance['show_facepile'])){
            $show_facepile = $instance['show_facepile'];
        } else {
            $show_facepile = 'true';
        }

        // Small Header
        if(isset($instance['use_small_header'])){
            $use_small_header = $instance['use_small_header'];
        } else {
            $use_small_header = 'false';
        }

        // Hide Cover
        if(isset($instance['hide_cover'])){
            $hide_cover = $instance['hide_cover'];
        } else {
            $hide_cover = 'false';
        }
        ?>
            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'fpp-domain'); ?></label>
                <input
                    class="widefat"
                    type="text"
                    id="<?php echo $this->get_field_id('title'); ?>"
                    name="<?php echo $this->get_field_name('title'); ?>"
                    value="<?php echo esc_attr($title); ?>"
                >
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('page_url'); ?>"><?php _e('Page URL', 'fpp-domain'); ?></label>
                <input
                    class="widefat"
                    type="text"
                    id="<?php echo $this->get_field_id('page_url'); ?>"
                    name="<?php echo $this->get_field_name('page_url'); ?>"
                    value="<?php echo esc_attr($page_url); ?>"
                >
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('show_timeline'); ?>"><?php _e('Show Timeline', 'fpp-domain'); ?></label>
                <select
                    class="widefat"
                    type="text"
                    id="<?php echo $this->get_field_id('show_timeline'); ?>"
                    name="<?php echo $this->get_field_name('show_timeline'); ?>"
                    value="<?php echo esc_attr($show_timeline); ?>"
                >
                    <option value="true" <?php echo ($show_timeline == 'true') ? 'selected' : ''; ?>> True
                    <option value="false" <?php echo ($show_timeline == 'false') ? 'selected' : ''; ?>> False
                </select>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('adapt_container'); ?>"><?php _e('Adapt Container', 'fpp-domain'); ?></label>
                <select
                    class="widefat"
                    type="text"
                    id="<?php echo $this->get_field_id('adapt_container'); ?>"
                    name="<?php echo $this->get_field_name('adapt_container'); ?>"
                    value="<?php echo esc_attr($adapt_container); ?>"
                >
                    <option value="true" <?php echo ($adapt_container == 'true') ? 'selected' : ''; ?>> True
                    <option value="false" <?php echo ($adapt_container == 'false') ? 'selected' : ''; ?>> False
                </select>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('width'); ?>"><?php _e('Width', 'fpp-domain'); ?></label>
                <input
                    class="widefat"
                    type="text"
                    id="<?php echo $this->get_field_id('width'); ?>"
                    name="<?php echo $this->get_field_name('width'); ?>"
                    value="<?php echo esc_attr($width); ?>"
                >
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('height'); ?>"><?php _e('Height', 'fpp-domain'); ?></label>
                <input
                    class="widefat"
                    type="text"
                    id="<?php echo $this->get_field_id('height'); ?>"
                    name="<?php echo $this->get_field_name('height'); ?>"
                    value="<?php echo esc_attr($height); ?>"
                >
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('show_facepile'); ?>"><?php _e('Show Faces', 'fpp-domain'); ?></label>
                <select
                    class="widefat"
                    type="text"
                    id="<?php echo $this->get_field_id('show_facepile'); ?>"
                    name="<?php echo $this->get_field_name('show_facepile'); ?>"
                    value="<?php echo esc_attr($show_facepile); ?>"
                >
                    <option value="true" <?php echo ($show_facepile == 'true') ? 'selected' : ''; ?>> True
                    <option value="false" <?php echo ($show_facepile == 'false') ? 'selected' : ''; ?>> False
                </select>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('use_small_header'); ?>"><?php _e('Use Small Header', 'fpp-domain'); ?></label>
                <select
                    class="widefat"
                    type="text"
                    id="<?php echo $this->get_field_id('use_small_header'); ?>"
                    name="<?php echo $this->get_field_name('use_small_header'); ?>"
                    value="<?php echo esc_attr($use_small_header); ?>"
                >
                    <option value="true" <?php echo ($use_small_header == 'true') ? 'selected' : ''; ?>> True
                    <option value="false" <?php echo ($use_small_header == 'false') ? 'selected' : ''; ?>> False
                </select>
            </p>

        <p>
            <label for="<?php echo $this->get_field_id('hide_cover'); ?>"><?php _e('Hide Cover', 'fpp-domain'); ?></label>
            <select
                    class="widefat"
                    type="text"
                    id="<?php echo $this->get_field_id('hide_cover'); ?>"
                    name="<?php echo $this->get_field_name('hide_cover'); ?>"
                    value="<?php echo esc_attr($hide_cover); ?>"
            >
                <option value="true" <?php echo ($hide_cover == 'true') ? 'selected' : ''; ?>> True
                <option value="false" <?php echo ($hide_cover == 'false') ? 'selected' : ''; ?>> False
            </select>
        </p>
        <?php
    }

    // Show Frontend Content
    public function getPagePlugin($data){
        ?>
        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2F<?php echo $data['page_url']; ?>&tabs=<?php echo($data['show_timeline'] == 'true' ? 'timeline' : ''); ?>&width=<?php echo $data['width']; ?>&<?php echo $data['height']; ?>&small_header=<?php echo $data['use_small_header']; ?>&adapt_container_width=<?php echo $data['adapt_container']; ?>&hide_cover=<?php echo $data['hide_cover']; ?>&show_facepile=<?php echo $data['show_facepile']; ?>&appId=260011235396005"
                width="<?php echo $data['width']; ?>" height="<?php echo $data['height']; ?>" style="border:none;overflow:hidden"
                scrolling="no" frameborder="0" allowTransparency="true"
                allow="encrypted-media"></iframe>
        <?php
    }
}