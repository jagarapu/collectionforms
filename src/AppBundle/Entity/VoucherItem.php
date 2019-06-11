<?php

namespace AppBundle\Entity;

/**
 * VoucherItem
 */
class VoucherItem
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $amount;

    /**
     * @var string
     */
    private $exchangeRate;

    /**
     * @var string
     */
    private $itemOrder;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return VoucherItem
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set amount
     *
     * @param string $amount
     *
     * @return VoucherItem
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set exchangeRate
     *
     * @param string $exchangeRate
     *
     * @return VoucherItem
     */
    public function setExchangeRate($exchangeRate)
    {
        $this->exchangeRate = $exchangeRate;

        return $this;
    }

    /**
     * Get exchangeRate
     *
     * @return string
     */
    public function getExchangeRate()
    {
        return $this->exchangeRate;
    }

    /**
     * Set itemOrder
     *
     * @param string $itemOrder
     *
     * @return VoucherItem
     */
    public function setItemOrder($itemOrder)
    {
        $this->itemOrder = $itemOrder;

        return $this;
    }

    /**
     * Get itemOrder
     *
     * @return string
     */
    public function getItemOrder()
    {
        return $this->itemOrder;
    }
    /**
     * @var \AppBundle\Entity\Voucher
     */
    private $voucher;


    /**
     * Set voucher
     *
     * @param \AppBundle\Entity\Voucher $voucher
     *
     * @return VoucherItem
     */
    public function setVoucher(\AppBundle\Entity\Voucher $voucher = null)
    {
        $this->voucher = $voucher;

        return $this;
    }

    /**
     * Get voucher
     *
     * @return \AppBundle\Entity\Voucher
     */
    public function getVoucher()
    {
        return $this->voucher;
    }
}
