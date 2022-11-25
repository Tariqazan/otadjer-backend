<div class="col-md-6">
    <div class="card">
      <div class="card-header border-bottom-0">
        <h3 class="mb-0">{{ trans('inventory::general.unit') }}</h3>
      </div>
      <table class="table">
          <thead class="thead-light">
              <tr class="row">
                <th class="col-md-2">{{ trans('general.actions') }}</th>
                <th class="col-md-8">{{ trans('inventory::general.unit') }}</th>
                <th class="col-md-2">{{ trans('inventory::general.default') }}</th>
              </tr>
            </thead>
      </table>

      <div style="max-height: 400px; overflow-x:auto;">
        <table class="table table-bordered" id="units">
          <tbody>
            <tr class="row" v-for="(row, index) in form.items" :index="index">
              <td class="col-md-2">
                <button type="button" @click="onDeleteUnit(index)" data-toggle="tooltip" title="{{ trans('general.delete') }}" class="btn btn-icon btn-outline-danger btn-lg"><i class="fa fa-trash"></i></button>
              </td>

              <td class="col-md-8">
                <input value=""
                  style="margin-left: 10px;"
                  class="form-control d-inline-block col-md-12"
                  data-item="unit_value"
                  required="required"
                  name="items[][unit_value]"
                  v-model="row.unit_value"
                  type="text"
                  autocomplete="off" />
              </td>

              <td class="col-md-2 custom-radio d-flex align-items-center justify-content-center" align="center">
                  <input type="checkbox"
                  name="items[][default_unit]"
                  :id="'default-unit-' + index"
                  data-item="default_unit"
                  @change="onChangeDefault(index)"
                  v-model="row.default_unit"
                  class="custom-control-input" />
                  <label style="margin-left: %50" :for="'default-unit-' + index" class="custom-control-label unit-checkbox"></label>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <table class="table">
          <tbody>
            <tr id="addItem">
              <td class="col-md-1">
                <button type="button" @click="onAddUnit" id="button-add-item" data-toggle="tooltip" title="{{ trans('general.add') }}" class="btn btn-icon btn-outline-success btn-lg" data-original-title="{{ trans('general.add') }}">
                  <i class="fa fa-plus"></i>
                </button>
              </td>
            </tr>
          </tbody>
      </table>
    </div>
  </div>

  @push('stylesheet')
  <style type="text/css">
     .unit-checkbox::before {
      left: 0 !important;
      right: 0 !important;
      margin: 0 auto !important;
    }
    .unit-checkbox::after {
      left: 0 !important;
    }
  </style>
  @endpush