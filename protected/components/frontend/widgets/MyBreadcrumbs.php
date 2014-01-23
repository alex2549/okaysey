<?php

Yii::import('bootstrap.widgets.TbBreadcrumbs');

/**
 * Bootstrap breadcrumb widget.
 * @see http://twitter.github.com/bootstrap/components.html#breadcrumbs
 */
class MyBreadcrumbs extends TbBreadcrumbs
{

    /**
     * Renders the content of the widget.
     * @throws CException
     */
    public function run()
    {
        // Hide empty breadcrumbs.
        if (empty($this->links))
            return;

        $links = array();

        if (!isset($this->homeLink))
        {
            $content = CHtml::link(Yii::t('zii', 'Home'), Yii::app()->homeUrl, array('title' => Yii::t('zii', 'Home')));
            $links[] = $this->renderItem($content);
        }
        else if ($this->homeLink !== false)
            $links[] = $this->renderItem($this->homeLink);

        foreach ($this->links as $label => $url)
        {
            if (is_string($label) || is_array($url))
            {
                $content = CHtml::link($this->encodeLabel ? CHtml::encode($label) : $label, $url, array('title' => $this->encodeLabel ? CHtml::encode($label) : $label));
                $links[] = $this->renderItem($content);
            }
            else
                $links[] = $this->renderItem($this->encodeLabel ? CHtml::encode($url) : $url, true);
        }

        echo CHtml::tag('ul', $this->htmlOptions, implode('', $links));
    }

    /**
     * Renders a single breadcrumb item.
     * @param string $content the content.
     * @param boolean $active whether the item is active.
     * @return string the markup.
     */
    protected function renderItem($content, $active = false)
    {
        // $separator = !$active ? '<span class="divider">'.$this->separator.'</span>' : '';

        ob_start();
        echo CHtml::openTag('li', $active ? array('class'=>'active') : array());
        echo $content;
        echo '</li>';
        return ob_get_clean();
    }
}