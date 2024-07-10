<?php

namespace App\Http\Livewire\VendorsCustomers;

use App\Models\VendorCustomerType;
use App\Models\VendorsCustomers;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Livewire\VendorsCustomers\Exports\VendorCustomerExport;
use App\Http\Livewire\VendorsCustomers\Imports\VendorCustomerImport;

class VendorsCustomersIndex extends Component
{
    use WithPagination, WithFileUploads;
	protected $paginationTheme 										= 'bootstrap';
	public $size 													= 10;
	public $column 													= 'id';
	public $order 													= 'desc';
	public $search 													= '';
	public $filter;
	public $com_id;
	// Import
	protected $import_errors 										= [];
	public $file;

    public function render()
    {
        $columns 													= collect(['code'=>'Codeasda','name'=>'Name','vendor_customer_type_id'=>'Type','active'=>'Active?']);
    	$vendors_customers 											= VendorsCustomers::where('company_id', Auth::user()->company_id)
																	    	->search(trim($this->search))
																	    	->orderBy($this->column, $this->order)
																	    	->paginate($this->size);
    	$import_errors 												= $this->import_errors;
    	$notes 														= collect([
															    	    'All columns with asterisks(*) should be filled.',
															    	    'Do not modify or remove column headers.',
                                                                        'TIN should be xxx-xxx-xxx-xxx'
															    	]);
        $table_title    = collect([
                            'Type Number',
                            'Type Name'
                        ]);

        $table_content  = collect([
                            '1' => 'Vendor',
                            '2' => 'Customer',
                            '3' => 'Vendor & Customer'
                        ]);


        return view('livewire.vendors-customers.vendors-customers-index',[
            'columns' 												=> $columns,
            'vendors_customers' 									=> $vendors_customers,
            'import_errors' 										=> $import_errors,
			'notes' 												=> $notes,
            'table_content'                                         => $table_content,
            'table_title'                                           => $table_title
		]);
    }

    public function export()
    {
            $this->com_id 											= Auth::user()->company_id;
            return (new VendorCustomerExport($this->com_id))->download('vendors-customers.csv');
    }

    public function import()
    {
        $this->validate(['file' => 'required|mimes:csv,txt|max:3072|file']);

        $import 													= new VendorCustomerImport;
        $import->import($this->file);
        $error_count = $import->failures()->unique(function ($item) {
            return $item->row();
        });
        $array 														= $import->toArray($this->file, null, \Maatwebsite\Excel\Excel::CSV);
        $count 														= count($array[0]);
        if($count == 0)
        {
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'                                          => 'center',
                'icon'                                              => 'warning',
                'title'                                             => 'No data found',
                'showConfirmButton'                                 => 'true',
                'timer'                                             => '1500',
                'link'                                              => '#'
             ]);
        }
        else
        {
            if(count($import->failures())){
                for ($i = count($array[0]) - count($error_count); $i > 0; $i--) {
                    $group 													= VendorsCustomers::where('company_id', Auth::user()->company_id)->orderBy('created_at', 'desc')->first();
                    $group->delete();
                }
                $this->import_errors = $import->failures()->sortBy(function($value, $key) {
                    return $value;
                });
            }else{
                $this->dispatchBrowserEvent('swal:redirect',[
                    'position'											=> 'center',
                    'icon'												=> 'success',
                    'title'												=> $count.' record/s has been successfully imported!',
                    'showConfirmButton'									=> 'true',
                    'timer'												=> '1500',
                    'link' 												=> '#'
                 ]);
            }

        }
        Storage::delete($this->file);
    }

    public function exportTemplate()
    {
        return Storage::disk('public')->download('templates/vendor-customer-template.csv');
    }

    public function mount()
    {
        $this->filter = [
        	'Code' 													=> true,
        	'Name' 													=> true,
            'Type'                                                  => true,
        	'Active?' 												=> true,
        	'Actions' 												=> true,
        ];

        

    }

    public function filterView()
    {
        $this->dispatchBrowserEvent('swal:redirect',[
            'position'          									=> 'center',
            'icon'              									=> 'success',
            'title'             									=> 'Successfully changed filter!',
            'showConfirmButton' 									=> 'true',
            'timer'             									=> '1500',
            'link'              									=> '#'
         ]);
    }
}



