<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * VoucherCollection
 */
class VoucherCollection
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Voucher[]|ArrayCollection
     */
    private $vouchers;

    public function __construct(){
        $this->vouchers = new ArrayCollection();
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
     * @return Voucher[]|ArrayCollection
     */
    public function getVouchers()
    {
        return $this->vouchers;
    }

    /**
     * @param Voucher[]|ArrayCollection $vouchers
     */
    public function setVouchers($vouchers)
    {
        $this->vouchers = $vouchers;
    }

    /**
     * Add Voucher.
     *
     * @param Voucher $voucher
     */
    public function addVoucher(Voucher $voucher)
    {
        if (!$this->vouchers->contains($voucher)) {
            $this->vouchers->add($voucher);
        }
    }

    /**
     * Remove Voucher.
     *
     * @param Voucher $voucher
     */
    public function removeItem(Voucher $voucher)
    {
        $this->vouchers->removeElement($voucher);
    }

}
