<?php

class BufferReader 
{
    /**
     * Holds the current buffer position
     * @var integer $position
     */
	protected $position;

	/**
     * Variable contains the buffered data
     * @var string $buffer
     */
	protected $buffer;

	/**
     * Variable contains the size of the buffered data
     * @var integer $position
     */
	protected $length;
	
	public function __construct($buffer = '')
	{
		$this->position = 0;
		$this->buffer = $buffer;
		$this->length = strlen($buffer);
	}
	
	public function hasNext()
	{
		return $this->position < $this->length;
	}

	public function read($size)
	{
		if($this->length < $this->position + $size)
        {
			throw new Exception('Index out of bounds.');
        }

		$value = substr($this->buffer, $this->position, $size);
        $this->position += $size;
        return $value;
	}
	
	public function readByte()
    {
        return ord($this->read(1));
	}
	
	public function readShort()
	{
		return unpack('v', $this->read(2))[1];
	}
	
	public function readLong()
	{
		return unpack('V', $this->read(4))[1];
    }
	
	public function readString($length = 0)
	{
		if($length == 0) {
			$length = $this->readShort();
        }
		
        return $this->read($length);
    }
	
	public function skipBytes($length)
	{
		$this->position += $length;
	}
}
