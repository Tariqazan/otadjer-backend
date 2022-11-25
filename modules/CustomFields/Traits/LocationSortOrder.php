<?php

namespace Modules\CustomFields\Traits;

use Modules\CustomFields\Events\CustomFieldLocationSortColumns;
use Modules\CustomFields\Traits\CustomFields;

trait LocationSortOrder
{
    use CustomFields;

    public function getLocationSortOrder($code)
    {
        $result = [];

        $default_fields = [
            'common.companies' => $this->getCompaniesColumns(),
            'common.items' => $this->getItemsColumns(),
            'sales.invoices' => $this->getInvoicesColumns(),
            'sales.revenues' => $this->getRevenuesColumns(),
            'sales.customers' => $this->getCustomersColumns(),
            'purchases.bills' => $this->getBillsColumns(),
            'purchases.payments' => $this->getPaymentsColumns(),
            'purchases.vendors' => $this->getVendorsColumns(),
            'banking.accounts' => $this->getAccountsColumns(),
            'banking.transfers' => $this->getTransferColumns(),
            'employees.employees' => $this->getEmployeesColumns(),
            'employees.positions' => $this->getPositionsColumns(),
            'assets.assets' => $this->getAssetsColumns(),
            'expenses.expense-claims' => $this->getExpenseClaimsColumns(),
        ];

        if (!array_key_exists($code, $default_fields)) {
            $result = event(new CustomFieldLocationSortColumns($code, $result), [], true);
        } else {
            $result = $default_fields[$code];
        }

        $custom_fields = $this->getFieldsByLocation($code)->pluck('name', 'code')->toArray();

        if (!empty($custom_fields)) {
            $result = array_merge($result, $custom_fields);
        }

        return $result;
    }

    public function getCompaniesColumns()
    {
        return [
            'name' => trans('general.name'),
            'locale' => trans_choice('general.languages', 1),
            'email' => trans('general.email'),
            'currency' => trans_choice('general.currencies', 1),
            'address' => trans('general.address'),
            'logo' => trans('companies.logo'),
            'enabled' => trans('general.enabled'),
        ];
    }

    public function getItemsColumns()
    {
        return [
            'name' => trans('general.name'),
            'description' => trans('general.description'),
            'sale_price' => trans('items.sales_price'),
            'purchase_price' => trans('items.purchase_price'),
            'tax_ids' => trans_choice('general.taxes', 1),
            'category_id' => trans_choice('general.categories', 1),
            'picture' => trans_choice('general.pictures', 1),
            'enabled' => trans('general.enabled'),
        ];
    }

    public function getInvoicesColumns()
    {
        return [
            'issued_at' => trans('invoices.invoice_date'),
            'due_at' => trans('invoices.due_date'),
            'document_number' => trans('invoices.invoice_number'),
            'order_number' => trans('invoices.order_number'),
            'item_custom_fields' => trans_choice('general.items', 2),
            'notes' => trans_choice('general.notes', 2),
            'category_id' => trans_choice('general.categories', 1),
            'recurring' => trans_choice('general.pictures', 1),
            'attachment' => trans('general.attachment'),
        ];
    }

    public function getRevenuesColumns()
    {
        return [
            'paid_at' => trans('general.date'),
            'amount' => trans('general.amount'),
            'account_id' => trans_choice('general.accounts', 1),
            'contact_id' => trans_choice('general.customers', 1),
            'description' => trans('general.description'),
            'category_id' => trans_choice('general.categories', 1),
            'recurring' => trans_choice('general.pictures', 1),
            'payment_method' => trans_choice('general.payment_methods', 1),
            'reference' => trans('general.reference'),
            'attachment' => trans('general.attachment'),
            'document_id' => trans_choice('general.invoices', 1),
        ];
    }

    public function getCustomersColumns()
    {
        return [
            'name' => trans('general.name'),
            'email' => trans('general.email'),
            'tax_number' => trans('general.tax_number'),
            'currency_code' => trans_choice('general.currencies', 1),
            'phone' => trans('general.phone'),
            'website' => trans('general.website'),
            'address' => trans('general.address'),
            'reference' => trans('general.reference'),
            'enabled' => trans('general.enabled'),
            'create_user' => trans('customers.can_login'),
        ];
    }

    public function getBillsColumns()
    {
        return [
            'issued_at' => trans('bills.bill_date'),
            'due_at' => trans('bills.due_date'),
            'document_number' => trans('bills.bill_number'),
            'order_number' => trans('bills.order_number'),
            'item_custom_fields' => trans_choice('general.items', 2),
            'notes' => trans_choice('general.notes', 2),
            'category_id' => trans_choice('general.categories', 1),
            'recurring' => trans_choice('general.pictures', 1),
            'attachment' => trans('general.attachment'),
        ];
    }

    public function getPaymentsColumns()
    {
        return [
            'paid_at' => trans('general.date'),
            'amount' => trans('general.amount'),
            'account_id' => trans_choice('general.accounts', 1),
            'contact_id' => trans_choice('general.vendors', 1),
            'description' => trans('general.description'),
            'category_id' => trans_choice('general.categories', 1),
            'recurring' => trans_choice('general.pictures', 1),
            'payment_method' => trans_choice('general.payment_methods', 1),
            'reference' => trans('general.reference'),
            'attachment' => trans('general.attachment'),
            'document_id' => trans_choice('general.bills', 1),
        ];
    }

    public function getVendorsColumns()
    {
        return [
            'name' => trans('general.name'),
            'email' => trans('general.email'),
            'tax_number' => trans('general.tax_number'),
            'currency_code' => trans_choice('general.currencies', 1),
            'phone' => trans('general.phone'),
            'website' => trans('general.website'),
            'address' => trans('general.address'),
            'logo' => trans_choice('general.pictures', 1),
            'reference' => trans('general.reference'),
            'enabled' => trans('general.enabled'),
        ];
    }

    public function getAccountsColumns()
    {
        return [
            'name' => trans('general.name'),
            'number' => trans('accounts.number'),
            'currency_code' => trans_choice('general.currencies', 1),
            'opening_balance' => trans('accounts.opening_balance'),
            'bank_name' => trans('accounts.bank_name'),
            'bank_phone' => trans('accounts.bank_phone'),
            'bank_address' => trans('accounts.bank_address'),
            'default_account' => trans('accounts.default_account'),
            'enabled' => trans('general.enabled'),
        ];
    }

    public function getTransferColumns()
    {
        return [
            'from_account_id' => trans('transfers.from_account'),
            'to_account_id' => trans('transfers.to_account'),
            'amount' => trans('general.amount'),
            'transferred_at' => trans('general.date'),
            'description' => trans('general.description'),
            'payment_method' => trans_choice('general.payment_methods', 1),
            'reference' => trans('general.reference'),
        ];
    }

    public function getEmployeesColumns()
    {
        return [
            'name' => trans('general.name'),
            'email' => trans('general.email'),
            'birth_day' => trans('employees::employees.birth_day'),
            'gender' => trans('employees::employees.gender'),
            'phone' => trans('general.phone'),
            'position_id' => trans_choice('employees::general.positions', 1),
            'address' => trans('general.address'),
            'enabled' => trans('general.enabled'),
            'amount' => trans('general.amount'),
            'currency_code' => trans_choice('general.currencies', 1),
            'tax_number' => trans('general.tax_number'),
            'bank_account_number' => trans('employees::employees.bank_account_number'),
            'hired_at' => trans('employees::employees.hired_at'),
        ];
    }

    public function getPositionsColumns()
    {
        return [
            'name' => trans('general.name'),
            'enabled' => trans('general.enabled'),
        ];
    }

    public function getAssetsColumns()
    {
        return [
            'name' => trans('general.name'),
            'category_id' => trans_choice('general.categories', 1),
            'serial_number' => trans('assets::assets.serial_number'),
            'description' => trans('general.description'),
            'attachment' => trans('general.attachment'),
        ];
    }

    public function getExpenseClaimsColumns()
    {
        return [
            'issued_at' => trans('expenses::expense_claims.issued_at'),
            'due_at' => trans('invoices.due_date'),
            'document_number' => trans('expenses::expense_claims.document_number'),
            'approver_user_id' => trans('expenses::expense_claims.approver'),
            'employee_contact_id' => trans_choice('employees::general.employees', 1),
            'reimburse' => trans('expenses::expense_claims.paid_by_employee_to_reimburse'),
            'item_custom_fields' => trans_choice('general.items', 2),
            'category_id' => trans_choice('general.categories', 1),
            'attachment' => trans('general.attachment'),
        ];
    }
}
