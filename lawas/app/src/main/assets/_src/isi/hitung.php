<div class="field">
	<label for="" class="label">Tukar ke Dinar Dirham (dalam rupiah)</label>
	<input v-model='inputKonversi' type="tel" class="input" />
</div>
<div class="field">
	<button @click='konversi' class="button is-success">cek</button>
</div>
<hr />
<div class="content">
	<p><strong>Ke Dinar Dirham</strong></p>
	<p>
		{{ dinar1.toLocaleString('id') }} dinar <br />
		{{ dirham1.toLocaleString('id') }} dirham <br />
		{{ rupiah1.toLocaleString('id') }} rupiah
	</p>
	<p><strong>Ke Dinar</strong></p>
	<p>
		{{ dinar2.toLocaleString('id') }} dinar <br />
		{{ rupiah2.toLocaleString('id') }} rupiah
	</p>
	<p><strong>Ke Dirham</strong></p>
	<p>
		{{ dirham3.toLocaleString('id') }} dirham <br />
		{{ rupiah3.toLocaleString('id') }} rupiah
	</p>
</div>