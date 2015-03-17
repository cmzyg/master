<?php

class Settings extends Controller {

    public function getHomepageSettings()
    {
        $this->select('SELECT * FROM settings_homepage');
        return $this->fetch();
    }

    public function getGeneralSettings()
    {
        $this->select('SELECT * FROM settings');
        return $this->fetch();
    }

    public function getOtherPages()
    {
        $this->select('SELECT * FROM other_pages');
        return $this->fetch();
    }

    public function getFixedPrices()
    {
        $this->select('SELECT * FROM fixed_prices');
        return $this->fetch();
    }

    public function getSEO()
    {
        // select homepage meta keywords
        $this->select('SELECT meta_keywords FROM seo');
        $seo = $this->fetch();
        
        // if keywords are empty then use auto generated keywords from local areas
        if($seo['meta_keywords'] == '')
        {
            $this->select('SELECT meta_keywords_main_area, meta_keywords_area2, meta_keywords_area3, meta_keywords_area4, meta_keywords_area5, meta_keywords_area6 FROM settings');
            $seo = $this->fetch();
            $meta_keywords = $seo['meta_keywords_main_area'] . ', ' . $seo['meta_keywords_area2'] . ', ' . $seo['meta_keywords_area3'] . ', ' . $seo['meta_keywords_area4'] . ', ' . $seo['meta_keywords_area5'] . ', ' . $seo['meta_keywords_area6'];
        }
        // else use main meta keywords
        else
        {
            $meta_keywords = $seo['meta_keywords'];
        }

        return $meta_keywords;
    }

    public function getHomepageDescription()
    {
        // select homepage meta keywords
        $this->select('SELECT homepage_subtitle FROM settings_homepage');
        $seo_default  = $this->fetch();

        $this->select('SELECT meta_description FROM seo');
        $seo_override = $this->fetch();
        
        // if keywords are empty then use auto generated keywords from local areas
        if($seo_override['meta_description'] !== '')
        {
            $meta_description = $seo_override['meta_description'];
        }
        // else use main meta keywords
        else
        {
            $meta_description = $seo_default['homepage_subtitle'];
        }

        return $meta_description;
    }

    public function getHomepageTitle()
    {
        // select homepage meta keywords
        $this->select('SELECT homepage_title FROM settings_homepage');
        $seo_default  = $this->fetch();

        $this->select('SELECT meta_title FROM seo');
        $seo_override = $this->fetch();
        
        // if keywords are empty then use auto generated keywords from local areas
        if($seo_override['meta_title'] !== '')
        {
            $meta_title = $seo_override['meta_title'];
        }
        // else use main meta title
        else
        {
            $meta_title = $seo_default['homepage_title'];
        }

        return $meta_title;
    }


    public function getBookingsSEO()
    {
        $this->select('SELECT meta_title_booking, meta_description_booking, meta_keywords_booking FROM seo');
        return $this->fetch();
    }


    public function getSocialMedia()
    {
        $this->selectAll("SELECT * FROM social_media WHERE status = 'Active'");
        return $this->fetchAll();
    }

    public function getLogo()
    {
        $this->select('SELECT logo, logo_width, logo_height, header_status, header_title, header_subtitle FROM settings_homepage');
        return $this->fetch();
    }
}

?>