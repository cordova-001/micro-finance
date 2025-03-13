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
            ['account_number' => '202', 'account_name' => 'Customer Savings', 'type' => 'Asset', 'notes' => 'Savings deposited by customers'],
            ['account_number' => '203', 'account_name' => 'Investment Receivable', 'type' => 'Asset', 'notes' => 'Investment returns expected'],
            ['account_number' => '204', 'account_name' => 'Fixed Assets', 'type' => 'Asset', 'notes' => 'Investment in properties, equipment, and long-term holdings'],
            ['account_number' => '205', 'account_name' => 'Marketable Securities', 'type' => 'Asset', 'notes' => 'Stocks, bonds, or other liquid investments'],
            ['account_number' => '1050', 'account_name' => 'Loan Receivable', 'type' => 'Asset', 'notes' => 'Loans given to borrowers'],
            ['account_number' => '1060', 'account_name' => 'Investment Receivable', 'type' => 'Asset', 'notes' => 'Expected earnings from investments'],
            ['account_number' => '1080', 'account_name' => 'Marketable Securities', 'type' => 'Asset', 'notes' => 'Short-term investments like stocks and bonds'],


            // Liabilities
            ['account_number' => '301', 'account_name' => 'Savings Penalties', 'type' => 'Liability', 'notes' => 'Penalties charged on customer savings'],
            ['account_number' => '302', 'account_name' => 'Investment Payable', 'type' => 'Liability', 'notes' => 'Amount owed to investors for returns'],
            ['account_number' => '303', 'account_name' => 'Investment Deposits', 'type' => 'Liability', 'notes' => 'Funds deposited by investors for investment'],
            ['account_number' => '2030', 'account_name' => 'Investment Payable', 'type' => 'Liability', 'notes' => 'Investment returns owed to investors'],
            ['account_number' => '2050', 'account_name' => 'Investment Deposits', 'type' => 'Liability', 'notes' => 'Investor contributions'],
            ['account_number' => '2070', 'account_name' => 'Loan Penalties Payable', 'type' => 'Liability', 'notes' => 'Penalties charged on overdue loans'],


            // Income (Revenue)
            ['account_number' => '401', 'account_name' => 'Loan Repayment', 'type' => 'Income', 'notes' => 'Repayments received from borrowers'],
            ['account_number' => '402', 'account_name' => 'Loan Penalties', 'type' => 'Income', 'notes' => 'Penalties charged on overdue loans'],
            ['account_number' => '403', 'account_name' => 'Loan Charges', 'type' => 'Income', 'notes' => 'Processing fees for loan disbursement'],
            ['account_number' => '404', 'account_name' => 'Interest on Loan', 'type' => 'Income', 'notes' => 'Interest earned from loans'],
            ['account_number' => '405', 'account_name' => 'Opening Fees', 'type' => 'Income', 'notes' => 'Fees charged for opening accounts'],
            ['account_number' => '406', 'account_name' => 'Maintenance Fees', 'type' => 'Income', 'notes' => 'Fees for account maintenance'],
            ['account_number' => '407', 'account_name' => 'Interest on Savings', 'type' => 'Income', 'notes' => 'Interest paid on customer savings'],
            ['account_number' => '408', 'account_name' => 'Investment Income', 'type' => 'Income', 'notes' => 'Earnings from investments'],
            ['account_number' => '409', 'account_name' => 'Dividends Income', 'type' => 'Income', 'notes' => 'Income from stock dividends'],
            ['account_number' => '4010', 'account_name' => 'Loan Interest Income', 'type' => 'Income', 'notes' => 'Interest earned from loans'],
            // ['account_number' => '4020', 'account_name' => 'Loan Repayment Income', 'type' => 'Income', 'notes' => 'Loan repayments received'],
            ['account_number' => '4030', 'account_name' => 'Loan Processing Fees', 'type' => 'Income', 'notes' => 'Charges for loan processing'],
            ['account_number' => '4040', 'account_name' => 'Investment Income', 'type' => 'Income', 'notes' => 'Earnings from investments'],
            ['account_number' => '4050', 'account_name' => 'Dividends Income', 'type' => 'Income', 'notes' => 'Earnings from stock investments'],
            ['account_number' => '4070', 'account_name' => 'Penalties Income', 'type' => 'Income', 'notes' => 'Income from penalties on loans and savings'],


            // Expenses
            ['account_number' => '501', 'account_name' => 'Investment Management Fees', 'type' => 'Expense', 'notes' => 'Fees paid to manage investment portfolios'],
            ['account_number' => '502', 'account_name' => 'Investment Losses', 'type' => 'Expense', 'notes' => 'Losses incurred from investment activities'],
            ['account_number' => '5050', 'account_name' => 'Loan Default Losses', 'type' => 'Expense', 'notes' => 'Bad debts from unpaid loans'],
            ['account_number' => '5060', 'account_name' => 'Investment Management Fees', 'type' => 'Expense', 'notes' => 'Fees for investment services'],
        
        ];

        // Insert into database
        DB::table('charts')->insert($accounts);
    }
}
