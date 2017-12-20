<div class="full-height m-b-3">
	<div class="row">
	    <div class="col-lg-3 m-b-2">
	        <? $this->load->view('section/user/account/menu') ?>
	    </div>
	<!-- END Left Column -->

		<div class="col-lg-9">
	    <? $this->load->view('section/user/account/'.$this->subview) ?>
		</div>
	</div>
</div>