<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Voucher
 */
class Voucher
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var string
     */
    private $documentNo;

    /**
     * @var VoucherItem[]|ArrayCollection
     */
    private $items;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->items = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Voucher
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set documentNo
     *
     * @param string $documentNo
     *
     * @return Voucher
     */
    public function setDocumentNo($documentNo)
    {
        $this->documentNo = $documentNo;

        return $this;
    }

    /**
     * Get documentNo
     *
     * @return string
     */
    public function getDocumentNo()
    {
        return $this->documentNo;
    }

    /**
     * Add item
     *
     * @param \AppBundle\Entity\VoucherItem $item
     *
     * @return Voucher
     */
    public function addItem(\AppBundle\Entity\VoucherItem $item)
    {
        if (!$this->items->contains($item)) {
            $this->items->add($item);
            $item->setVoucher($this);
        }
    }

    /**
     * Remove item
     *
     * @param \AppBundle\Entity\VoucherItem $item
     */
    public function removeItem(\AppBundle\Entity\VoucherItem $item)
    {
        $this->items->removeElement($item);
        $item->setVoucher(null);
    }

    /**
     * Get items
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getItems()
    {
        return $this->items;
    }
}
