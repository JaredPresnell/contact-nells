<form id="nellsContactForm" action = "#" method="post">
	<div class="form-group">
		<div class="row">
			<div class="col-3 col-md-2 nells_contact_label"><label class="nells_contact_label">Name*</label>
			</div>
			<div class="col-8">
				<input type="text" class="form-control nells_contact_input" placeholder="Your Name" id="name" name="name" required="required" />
			</div>
		</div> <!-- row -->
	</div>

	<div class="form-group">
		<div class="row">
			<div class="col-3 col-md-2 nells_contact_label"><label class="nells_contact_label">Email*</label>
			</div>
			<div class="col-8">
				<input type="text" class="form-control nells_contact_input" placeholder="Your Email" id="email" name="email" required="required" />
			</div>
		</div> <!-- row -->
	</div>

	<div class="form-group">
		<div class="row">
			<div class="col-3 col-md-2 nells_contact_label"><label class="nells_contact_label">Message*</label>
			</div>
			<div class="col-8 col-md-8">
				<textarea class="form-control nells_contact_input" placeholder="Your Message" id="message" name="message" required="required" /></textarea>
			</div>
		</div> <!-- row -->
	</div>
	<div class="row">
		<div class="col-8 offset-md-2 offset-3">
			<button type="submit" class="btn btn-default btn_contact_nells">Send it!</button>
			<small class="js-form-submit form-control-msg">Sending, please wait...</small>
			<small class="js-form-error form-control-msg">An error has occurred, please try again</small>
			<small class="js-form-success form-control-msg">Message Sent!</small>
		</div>
	</div>

</form>