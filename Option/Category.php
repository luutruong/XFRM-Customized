<?php

namespace Truonglv\XFRMCustomized\Option;

use XF\Option\AbstractOption;

class Category extends AbstractOption
{
    public static function renderSelectMultiple(\XF\Entity\Option $option, array $htmlParams)
    {
        /** @var \XFRM\Repository\Category $categoryRepo */
        $categoryRepo = $option->repository('XFRM:Category');
        $choices = $categoryRepo->getCategoryOptionsData();

        $choices[0]['label'] = \XF::phrase('(unspecified)');

        $data = [
            'htmlParams' => $htmlParams,
            'controlOptions' => self::getControlOptions($option, $htmlParams),
            'rowOptions' => self::getRowOptions($option, $htmlParams)
        ];
        $data['controlOptions']['multiple'] = true;
        $data['controlOptions']['size'] = 8;

        return self::getTemplater()->formSelectRow(
            $data['controlOptions'], $choices, $data['rowOptions']
        );
    }
}
