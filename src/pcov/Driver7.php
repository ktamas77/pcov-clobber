<?php
namespace pcov 
{
	/**
	 * Driver for PCOV code coverage functionality.
	 *
	 * @codeCoverageIgnore
	 */
	class Driver7 implements \SebastianBergmann\CodeCoverage\Driver\Driver
	{
	    public function __construct($filter = null)
	    {
		
	    }

	    /**
	     * Start collection of code coverage information.
	     */
	    public function start(bool $determineUnusedAndDead = true) : void
	    {
		\pcov\start();
	    }

	    /**
	     * Stop collection of code coverage information.
	     */
	    public function stop() : array
	    {
		\pcov\stop();

		$waiting = \pcov\waiting();
		$collect  = [];

		if ($waiting) {
			$collect = \pcov\collect(\pcov\inclusive, $waiting);

			if ($collect) {
				\pcov\clear();
			}
		}

		return $collect;
	    }
	}

}