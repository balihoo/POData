<?php

namespace ODataProducer\UriProcessor\QueryProcessor\OrderByParser;

/**
 * Class OrderByPathSegment
 *
 * A type to represent path segment in an order by clause
 * Syntax of orderby clause is:
 *
 * OrderByClause         : OrderByPathSegment [, OrderByPathSegment]*
 * OrderByPathSegment    : OrderBySubPathSegment [/OrderBySubPathSegment]*[asc|desc]?
 * OrderBySubPathSegment : identifier
 *
 * @package ODataProducer\UriProcessor\QueryProcessor\OrderByParser
 */
class OrderByPathSegment
{
    /**
     * Collection of sub path in this path segment
     * 
     * @var array(OrderBySubPathSegment)
     */
    private $_orderBySubPathSegments;

    /**
     * Flag indicates order of sorting, ascending or desending, default is ascending
     * 
     * @var boolean
     */
    private $_isAscending;

    /**
     * Constructs a new instance of OrderByPathSegment
     * 
     * @param array(OrderBySubPathSegment) $orderBySubPathSegments Collection of 
     *                                                             orderby sub path 
     *                                                             segments for
     *                                                             this path segment.
     * @param boolean                      $isAscending            sort order, 
     *                                                             True for 
     *                                                             ascending and 
     *                                                             false
     *                                                             for desending.
     */
    public function __construct($orderBySubPathSegments, $isAscending = true) 
    {
        if (!is_array($orderBySubPathSegments)) {
            throw new \InvalidArgumentException(
                Messages::orderByPathSegmentOrderBySubPathSegmentArgumentShouldBeNonEmptyArray()
            );
        }

        if (empty($orderBySubPathSegments)) {
            throw new \InvalidArgumentException(
                Messages::orderByPathSegmentOrderBySubPathSegmentArgumentShouldBeNonEmptyArray()
            );
        }

        $this->_orderBySubPathSegments = $orderBySubPathSegments;
        $this->_isAscending = $isAscending;
    }

    /**
     * Gets collection of sub path segments that made up this path segment
     * 
     * @return array(OrderBySubPathSegment)
     */
    public function getSubPathSegments()
    {
        return $this->_orderBySubPathSegments;
    }

    /**
     * To check sorting order is ascending or descending
     * 
     * @return boolean Return true for ascending sort order else false
     */
    public function isAscending()
    {
        return $this->_isAscending;
    }
}