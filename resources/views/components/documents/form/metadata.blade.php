<div class="row">
    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
        @if (!$hideContact)
        <div class="row">
            <x-select-contact-card
                type="{{ $contactType }}"
                :contact="$contact"
                :contacts="$contacts"
                :search-route="$contactSearchRoute"
                :create-route="$contactCreateRoute"
                error="form.errors.get('contact_name')"
                :text-add-contact="$textAddContact"
                :text-create-new-contact="$textCreateNewContact"
                :text-edit-contact="$textEditContact"
                :text-contact-info="$textContactInfo"
                :text-choose-different-contact="$textChooseDifferentContact"
            />
        </div>
        @endif
    </div>

    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
        <div class="row">
             
            @if (!$hideIssuedAt)
            {{ Form::dateGroup('issued_at', trans($textIssuedAt), 'calendar', ['id' => 'issued_at', 'class' => 'form-control datepicker', 'required' => 'required', 'show-date-format' => company_date_format(), 'date-format' => 'Y-m-d', 'autocomplete' => 'off', 'change' => 'setDueMinDate'], $issuedAt) }}
            @endif

            @if (!$hideDocumentNumber)
            {{ Form::textGroup('document_number', trans($textDocumentNumber), 'file', ['required' => 'required'], $documentNumber) }}
            @endif

            @if (!$hideDueAt)
                @if ($type == 'invoice')
                    {{ Form::dateGroup('due_at', trans($textDueAt), 'calendar', ['id' => 'due_at', 'class' => 'form-control datepicker', 'required' => 'required', 'show-date-format' => company_date_format(), 'period' => setting('invoice.payment_terms'), 'date-format' => 'Y-m-d', 'autocomplete' => 'off', 'min-date' => 'form.issued_at', 'min-date-dynamic' => 'min_due_date', 'data-value-min' => true], $dueAt) }}
                @else
                    {{ Form::dateGroup('due_at', trans($textDueAt), 'calendar', ['id' => 'due_at', 'class' => 'form-control datepicker', 'required' => 'required', 'show-date-format' => company_date_format(), 'date-format' => 'Y-m-d', 'autocomplete' => 'off', 'min-date' => 'form.issued_at', 'min-date-dynamic' => 'min_due_date', 'data-value-min' => true], $dueAt) }}
                @endif
            @else
            {{ Form::hidden('due_at', old('issued_at', $issuedAt), ['id' => 'due_at', 'v-model' => 'form.issued_at']) }}
            @endif

            @if (!$hideOrderNumber)
            {{ Form::textGroup('order_number', trans($textOrderNumber), 'shopping-cart', [], $orderNumber) }}
            @endif

            <?php 

            $id = '';
            $roleid = \DB::table('user_roles')->where("user_id",auth()->id())->first();
            $data = '';            
            if($roleid->role_id != 1){
                $data = \DB::table("inventory_warehouses")->whereIn('id',\DB::table("inventory_user_warehouses")->where("user_id",auth()->id())->pluck("warehouse_id")->toArray())->whereNull('deleted_at')->get();
            }else{
                $data = \DB::table("inventory_warehouses")->whereNull('deleted_at')->get();
            }
             

            ?>

             <div class=" col-md-12">
               <label for="order_number" class="form-control-label">Warehouses List</label> 
               <div class="input-group input-group-merge ">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-warehouse"></i></span></div>
                  <select  name="w_id" id="w_id"  onchange="addID()" >
                    @forelse ($data as $warehouses)
                        @php
                        if($loop->first)
                            $id = $warehouses->id
                        @endphp                      
                     <option value="{{ $warehouses->id }}" >{{ $warehouses->name }}</option>
                      @empty
                            <option>No warehouses found</option>
                      @endforelse
                  </select>

               </div>
               <!---->
            </div>
           
            <script type="text/javascript">
                document.cookie='w_idss='+@php echo $id @endphp;

                function addID(){
                    document.cookie='w_idss='+document.getElementById("w_id").value;
                    console.log("document.cookie",document.cookie); 
                }
            </script>


        </div>
    </div>
</div>
