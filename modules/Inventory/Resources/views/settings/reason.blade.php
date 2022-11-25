<div class="col-md-6">
    <div class="card">
      <div class="card-header border-bottom-0">
        <h3 class="mb-0">{{ trans('inventory::transferorders.reason') }}</h3>
      </div>
      <table class="table">
          <thead class="thead-light">
              <tr class="row">
                <th class="col-md-2">{{ trans('general.actions') }}</th>
                <th class="col-md-10">{{ trans('inventory::transferorders.reason') }}</th>
              </tr>
            </thead>
      </table>

      <div style="max-height: 400px; overflow-x:auto;">
        <table class="table table-bordered" id="reasons">
          <tbody>
            <tr class="row" v-for="(row, index) in form.reasons" :index="index">
              <td class="col-md-2">
                <button type="button" @click="onDeleteReason(index)" data-toggle="tooltip" title="{{ trans('general.delete') }}" class="btn btn-icon btn-outline-danger btn-lg"><i class="fa fa-trash"></i></button>
              </td>

              <td class="col-md-10">
                <div class="row">
                  <input value=""
                  style="margin-left: 10px;"
                  class="form-control d-inline-block col-md-12"
                  data-item="reason_value"
                  required="required"
                  name="reasons[][reason_value]"
                  v-model="row.reason_value"
                  type="text"
                  autocomplete="off" />
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <table class="table">
          <tbody>
              <tr id="addItem">
              <td class="col-md-1">
                <button type="button" @click="onAddReason" id="button-add-item" data-toggle="tooltip" title="{{ trans('general.add') }}" class="btn btn-icon btn-outline-success btn-lg" data-original-title="{{ trans('general.add') }}">
                  <i class="fa fa-plus"></i>
                </button>
              </td>
            </tr>
          </tbody>
      </table>
    </div>
  </div>