<?php ob_start() ?>
	<!-- <div class="mb-4">
		<a href="https://play.google.com/store/apps/details?id=com.mzaini30.tukardinardirham" class="button">review app</a>
		<a href="https://www.nihbuatjajan.com/mzaini30" class="button">donate</a>
	</div> -->
	<div class="app" v-cloak @vue:mounted='cek'>
		<div class="tabs is-boxed">
		  <ul>
		  	<?php $tab = ['hitung', 'atur', 'panduan'] ?>
		  	<?php foreach ($tab as $x): ?>
		    	<li 
		    		:class='posisi == "<?= $x ?>" ? "is-active" : null'
		    		@click='posisi = "<?= $x ?>"'
		    	><a><?= $x ?></a></li>
		  	<?php endforeach ?>
		  </ul>
		</div>
		<?php foreach ($tab as $x): ?>
			<div class="isi" v-if='posisi == "<?= $x ?>"'>
				<?php include('isi/' . $x . '.php') ?>
			</div>
		<?php endforeach ?>
	</div>

	<script>
		const {createApp} = PetiteVue
		const {set, get} = idbKeyval

		createApp({
			posisi: 'hitung',
			setDinar: '',
			setDirham: '',
			inputKonversi: '',
			dinar1: 0,
			dirham1: 0,
			rupiah1: 0,
			dinar2: 0,
			rupiah2: 0,
			dirham3: 0,
			rupiah3: 0,
			async konversi(){
				const {floor} = Math
				const input = +this.inputKonversi

				this.dinar1 = floor(input / this.setDinar)
				this.dirham1 = floor((input - this.dinar1 * this.setDinar) / this.setDirham)
				this.rupiah1 = input - this.dinar1 * this.setDinar - this.dirham1 * this.setDirham

				this.dinar2 = floor(input / this.setDinar)
				this.rupiah2 = input - this.dinar2 * this.setDinar

				this.dirham3 = floor(input / this.setDirham)
				this.rupiah3 = input - this.dirham3 * this.setDirham
			},
			async cek(){
				const nilaiDinar = await get('nilaiDinar')
				const nilaiDirham = await get('nilaiDirham')
				nilaiDinar ? this.setDinar = nilaiDinar : null
				nilaiDirham ? this.setDirham = nilaiDirham : null
			},
			async simpan(){
				const nilaiDinar = await set('nilaiDinar', this.setDinar)
				const nilaiDirham = await set('nilaiDirham', this.setDirham)
				if (nilaiDinar == undefined && nilaiDirham == undefined){
					confetti()
				}
			}
		}).mount('.app')
	</script>
<?php $body = ob_get_clean() ?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/layout.php' ?>