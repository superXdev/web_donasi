<x-app-layout>
	<x-slot name="head">
		<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
	</x-slot>

	<x-slot name="title">Kontak</x-slot>

	@if(session()->has('success'))
	<x-alert type="success" message="{{ session()->get('success') }}" />
	@endif

	@if(session()->has('failed'))
	<x-alert type="danger" message="{{ session()->get('failed') }}" />
	@endif
	<div class="row">
		<div class="col-md-12 mb-3">
			<div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Pesan Masuk</h3>

              <div class="card-tools">
              	<select name="filter" class="form-control form-control-sm">
              		<option value="all"{{ (request()->get('filter') == 'all') ? ' selected': '' }}>Semua</option>
              		<option value="0"{{ (request()->get('filter') == '0') ? ' selected': '' }}>Belum dibaca</option>
              		<option value="1"{{ (request()->get('filter') == '1') ? ' selected': '' }}>Sudah dibaca</option>
              		<option value="2"{{ (request()->get('filter') == '2') ? ' selected': '' }}>Dibalas</option>
              	</select>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm bulk-delete">
                    <i class="far fa-trash-alt"></i>
                  </button>
                </div>
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                  	@foreach($contacts as $contact)
	                  <a href="#a">
	                  	<tr>
	                    <td>
	                      <div class="icheck-primary">
	                        <input type="checkbox" value="{{ $contact->id }}" id="id-{{ $contact->id }}">
	                        <label for="id-{{ $contact->id }}"></label>
	                      </div>
	                    </td>
	                    <td class="mailbox-name"><a href="{{ route('admin.contact.show', $contact->id) }}">{{ $contact->name }}</a></td>
	                    <td class="mailbox-subject"><b>{{ $contact->subject }}</b> - {{ Str::limit($contact->message, 30) }}
	                    </td>
	                    <td class="mailbox-attachment">
	                    	@if($contact->status == 0)
	                    	<span class="badge badge-secondary">Belum dibaca</span>
	                    	@elseif($contact->status == 1)
												<span class="badge badge-primary">Sudah dibaca</span>
	                    	@elseif($contact->status == 2)
	                    	<span class="badge badge-success">Dibalas</span>
	                    	@endif
	                    </td>
	                    <td class="mailbox-date">{{ $contact->created_at->diffForHumans() }}</td>
	                  </tr>
	                  </a>
	                  @endforeach
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
          </div>
		</div>
	</div>

	<form action="{{ route('admin.contact.bulk_delete') }}" method="POST" id="form-delete">
		@csrf
	</form>

	<x-slot name="script">
		<script>

			$(function () {
		    //Enable check and uncheck all functionality
		    $('.checkbox-toggle').click(function () {
		      var clicks = $(this).data('clicks')
		      if (clicks) {
		        //Uncheck all checkboxes
		        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
		        $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
		      } else {
		        //Check all checkboxes
		        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
		        $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
		      }
		      $(this).data('clicks', !clicks)
		    })

		    $('select').on('change', function() {
		    	const code = this.value;
				  window.location.replace('{{ route('admin.contact.index') }}' + '?filter=' + code);
				});

				$('.bulk-delete').click(function() {
					const ok = confirm('Ingin menghapus pesan yang dipilih?')

					if(!ok) {
						return;
					}

					$('[type="checkbox"]').each(function() {
						if(this.checked) {
							$('#form-delete').append(`<input type="hidden" value="${this.value}" name="id[]">`);
						}
					});

					$('#form-delete').submit();
				});
		  });
		</script>
	</x-slot>
</x-app-layout>