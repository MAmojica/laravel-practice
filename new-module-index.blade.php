<div>
    <div>
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <strong>VENDORS/CUSTOMERS</strong>
                    <div>
                        <button type="button" title="Import" class="btn btn-warning" data-coreui-toggle="modal" data-coreui-target="#importModal">
                        <span class="bi bi-file-earmark-spreadsheet"></span> 
                            <span class='btn-text'>Import</span> 
                        </button>
                        <button type="button" title="Export" wire:click.prevent='export' id='csv' wire:loading.attr="disabled" wire:loading.remove class="btn btn-primary">
                            <div>
                                <i class="bi bi-file-earmark-arrow-down"></i> 
                            <span class='btn-text'>Export</span> 
                            </div>
                        </button>
                        <button disabled wire:loading wire:target="export" type="button" class="btn btn-primary">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Exporting CSV ... </button>
                        <a class="btn btn-info text-white" title="Add" href="{{ route('vendor-customer-type.create') }}">
                        <span class="bi bi-plus-lg btn-icon"></span>
                            <span class='btn-text'>Add</span> 
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('livewire.components.sorting', ['filterable' => true])
                <div class="table-responsive m-3">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th width="2%">#</th>
                                @foreach($filter as $item => $value)
                                @if($value)
                                <th>{{$item}}</th>
                                @endif
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($vendors_customers  as $index => $vendor_customer)
                            <tr>
                                <td><small class="text-secondary">{{$index+1}}</small></td>
                                @if($filter['Code'])
                                <td>{{ $vendor_customer->code }}</td>
                                @endif
                                @if($filter['Name'])
                                <td>{{ $vendor_customer->name }}</td>
                                @endif
                                @if($filter['Type'])
                                <td>{{ $vendor_customer->vendor_customer_type->name }}</td>
                                @endif
                                @if($filter['Active?'])
                                <td class="text-center">
                                    @switch($vendor_customer->active)
                                        @case(1)
                                            <span class="p-2 badge rounded-pill bg-success">Yes</span>
                                            @break
                                        @default
                                        <span class="p-2 badge rounded-pill bg-secondary">No</span>
                                    @endswitch
                                </td>
                                @endif
                                @if($filter['Actions'])
                                <td class="text-center" width="7%">
                                    <a href="{{ route('vendor-customer-type.read',$vendor_customer->id) }}" class="me-2 btn btn-sm btn-info text-white">
                                    <span class="cil-folder-open btn-icon"></span>
                                    </a>
                                </td>
                                @endif
                            </tr>
                            @empty
                            <td class="text-center font-weight-bold" colspan="42">NO RECORDS</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $vendors_customers->links() }}
                </div>
            </div>
        </div>
        @include('livewire.components.import-modal', ['title'=> 'VENDORS/CUSTOMERS', 'notes' => $notes, 'choices' => [], 'table_title' => $table_title, 'table_content' => $table_content,'table_title2' => [], 'table_content2' => [] ])
    </div>
</div>
