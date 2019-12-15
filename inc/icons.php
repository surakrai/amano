<?php

function amano_icons() {

	$output = '<div class="amano-icons-modal" id="amano-icons-modal">
	<label><input type="radio" name="amano_icon" value="flaticon-search"><i class="flaticon-search"></i></label>
	<label><input type="radio" name="amano_icon" value="flaticon-youtube"><i class="flaticon-youtube"></i></label>
	<label><input type="radio" name="amano_icon" value="flaticon-facebook"><i class="flaticon-facebook"></i></label>
	<label><input type="radio" name="amano_icon" value="flaticon-twitter"><i class="flaticon-twitter"></i></label>
	<label><input type="radio" name="amano_icon" value="flaticon-instagram"><i class="flaticon-instagram"></i></label>
	<label><input type="radio" name="amano_icon" value="flaticon-whatsapp"><i class="flaticon-whatsapp"></i></label>
	<label><input type="radio" name="amano_icon" value="flaticon-clipboard"><i class="flaticon-clipboard"></i></label>
	<label><input type="radio" name="amano_icon" value="flaticon-null"><i class="flaticon-null"></i></label>
	<label><input type="radio" name="amano_icon" value="flaticon-check"><i class="flaticon-check"></i></label>
	<label><input type="radio" name="amano_icon" value="flaticon-slim-left"><i class="flaticon-slim-left"></i></label>
	<label><input type="radio" name="amano_icon" value="flaticon-slim-right"><i class="flaticon-slim-right"></i></label>
	<label><input type="radio" name="amano_icon" value="flaticon-next"><i class="flaticon-next"></i></label>
	<label><input type="radio" name="amano_icon" value="flaticon-back"><i class="flaticon-back"></i></label>
	<label><input type="radio" name="amano_icon" value="flaticon-download"><i class="flaticon-download"></i></label>
	<label><input type="radio" name="amano_icon" value="flaticon-upload"><i class="flaticon-upload"></i></label>
	<label><input type="radio" name="amano_icon" value="flaticon-checked"><i class="flaticon-checked"></i></label>
	<label><input type="radio" name="amano_icon" value="flaticon-cancel"><i class="flaticon-cancel"></i></label>
	<label><input type="radio" name="amano_icon" value="flaticon-next-1"><i class="flaticon-next-1"></i></label>
	<label><input type="radio" name="amano_icon" value="flaticon-back-1"><i class="flaticon-back-1"></i></label>
	<label><input type="radio" name="amano_icon" value="flaticon-up-arrow"><i class="flaticon-up-arrow"></i></label>
	<label><input type="radio" name="amano_icon" value="flaticon-ticket"><i class="flaticon-ticket"></i></label>
	<label><input type="radio" name="amano_icon" value="flaticon-boat"><i class="flaticon-boat"></i></label>
	<label><input type="radio" name="amano_icon" value="flaticon-taxi"><i class="flaticon-taxi"></i></label>
	<label><input type="radio" name="amano_icon" value="flaticon-pier"><i class="flaticon-pier"></i></label>
	<label><input type="radio" name="amano_icon" value="flaticon-van"><i class="flaticon-van"></i></label>
	<label><input type="radio" name="amano_icon" value="flaticon-aircraft"><i class="flaticon-aircraft"></i></label>
	<label><input type="radio" name="amano_icon" value="flaticon-fish"><i class="flaticon-fish"></i></label>
	<label><input type="radio" name="amano_icon" value="flaticon-dive"><i class="flaticon-dive"></i></label>
	<label><input type="radio" name="amano_icon" value="flaticon-cook"><i class="flaticon-cook"></i></label>
	<label><input type="radio" name="amano_icon" value="flaticon-copy-machine"><i class="flaticon-copy-machine"></i></label>
	<label><input type="radio" name="amano_icon" value="flaticon-print"><i class="flaticon-print"></i></label>
	<label><input type="radio" name="amano_icon" value="flaticon-cashew"><i class="flaticon-cashew"></i></label>
	<label><input type="radio" name="amano_icon" value="flaticon-crab"><i class="flaticon-crab"></i></label>
	<label><input type="radio" name="amano_icon" value="flaticon-mill"><i class="flaticon-mill"></i></label>
	<label><input type="radio" name="amano_icon" value="flaticon-wifi"><i class="flaticon-wifi"></i></label>
	<label><input type="radio" name="amano_icon" value="flaticon-sim"><i class="flaticon-sim"></i></label>
	<label><input type="radio" name="amano_icon" value="flaticon-internet"><i class="flaticon-internet"></i></label>
	<label><input type="radio" name="amano_icon" value="flaticon-card"><i class="flaticon-card"></i></label>
	<label><input type="radio" name="amano_icon" value="flaticon-visa"><i class="flaticon-visa"></i></label>
	<label><input type="radio" name="amano_icon" value="flaticon-bike"><i class="flaticon-bike"></i></label>
	<label><input type="radio" name="amano_icon" value="flaticon-loan"><i class="flaticon-loan"></i></label>
	</div>';
	return $output;
}


add_action('admin_footer', 'amano_admin_footer_function');

function amano_admin_footer_function() {
	echo amano_icons();
}