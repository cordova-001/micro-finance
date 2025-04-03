<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChartToAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accounts = [
            // Assets
            ['account_number' => '100', 'account_name' => 'Cash', 'type' => 'Asset', 'notes' => 'Cash and Bank Management'],
            ['account_number' => '201', 'account_name' => 'Loan Receivable', 'type' => 'Asset', 'notes' => 'Loans given to borrowers'],
            ['account_number' => '202', 'account_name' => 'Customer Savings Deposit', 'type' => 'Asset', 'notes' => 'Savings deposited by customers'],
            
            // Liabilities
            ['account_number' => '301', 'account_name' => 'Savings Penalties', 'type' => 'Liability', 'notes' => 'Penalties charged on customer savings'],
            ['account_number' => '2070', 'account_name' => 'Loan Penalties Payable', 'type' => 'Liability', 'notes' => 'Penalties charged on overdue loans'],


            // Income (Revenue)
            ['account_number' => '401', 'account_name' => 'Loan Repayment', 'type' => 'Income', 'notes' => 'Repayments received from borrowers'],
            ['account_number' => '402', 'account_name' => 'Loan Penalties', 'type' => 'Income', 'notes' => 'Penalties charged on overdue loans'],
            ['account_number' => '403', 'account_name' => 'Loan Charges', 'type' => 'Income', 'notes' => 'Processing fees for loan disbursement'],
            ['account_number' => '404', 'account_name' => 'Interest on Loan', 'type' => 'Income', 'notes' => 'Interest earned from loans'],
            ['account_number' => '405', 'account_name' => 'Opening Fees', 'type' => 'Income', 'notes' => 'Fees charged for opening accounts'],
            ['account_number' => '406', 'account_name' => 'Maintenance Fees', 'type' => 'Income', 'notes' => 'Fees for account maintenance'],
            ['account_number' => '407', 'account_name' => 'Interest on Savings', 'type' => 'Income', 'notes' => 'Interest paid on customer savings'],
            ['account_number' => '4010', 'account_name' => 'Loan Interest Income', 'type' => 'Income', 'notes' => 'Interest earned from loans'],
            
            ['account_number' => '4030', 'account_name' => 'Loan Processing Fees', 'type' => 'Income', 'notes' => 'Charges for loan processing'],
            

            // Expenses
            ['account_number' => '5050', 'account_name' => 'Loan Default Losses', 'type' => 'Expense', 'notes' => 'Bad debts from unpaid loans'],
            ['account_number' => '5060', 'account_name' => 'Investment Management Fees', 'type' => 'Expense', 'notes' => 'Fees for investment services'],
        
        ];

        // Insert into database
        // DB::table('charts')->insert($accounts);
        foreach ($accounts as $account) {
            DB::table('charts')->updateOrInsert(
                ['account_number' => $account['account_number']],
                $account
            );
        }
    }
}
