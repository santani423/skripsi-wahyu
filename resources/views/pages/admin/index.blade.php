<x-Layout.Master :title="Auth::user()->name">

	@slot('breadcrumbRight')
	<div class="ms-auto">
		 
	</div>
	@endslot

	@slot('body')



	@endslot
</x-Layout.Master>