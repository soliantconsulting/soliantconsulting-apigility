<?php

namespace ZF\Apigility\Doctrine\Server\Collection\Filter\ORM;

class LessThanOrEquals extends AbstractFilter
{
    public function filter($queryBuilder, $metadata, $option)
    {
        $queryType = $this->normalizeQueryType($option);
        $field = $this->normalizeField($option['field'], $queryBuilder, $metadata);
        $value = $this->normalizeValue($field, $option['value'], $queryBuilder, $metadata, $this->normalizeFormat($option));

        $parameter = uniqid('a');
        $queryBuilder->$queryType($queryBuilder->expr()->lte($field, ":$parameter"));
        $queryBuilder->setParameter($parameter, $value);
    }
}
