<?php
/**
 * Vaimo Brand
 *
 * @author Andrii Vivcharyk <andrii.vivcharyk@vaimo.com>
 * @package Vaimo_Brand
 * @copyright Copyright (c) 2021 Vaimo (http://www.vaimo.com)
 */

namespace Vaimo\Brand\Api\Data;

interface BrandInterface
{
    /**
     * @return string
     */
    public function getId();

    /**
     * @param int $id
     *
     * @return void
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     *
     * @return void
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @param string $description
     *
     * @return void
     */
    public function setDescription($description);

    /**
     * @return string
     */
    public function getImageLink();

    /**
     * @param string $link
     *
     * @return void
     */
    public function setImageLink($link);
}