<?php

namespace App\Console\Commands;

use App\Formatters\CompanyDataFormatter;
use App\Models\Company;
use Illuminate\Console\Command;

class ImportCompaniesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-companies';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import companies from the given file.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Import companies from the given file:");

        $csvData = str_getcsv(file_get_contents(storage_path('app/testCompanyDB.csv')), "\n");

        $csvHeader = [];

        foreach ($csvData as $line) {
            if (!empty($line)) {
                $data = str_getcsv($line, ";");
                if (empty($csvHeader)) {
                    $csvHeader = $data;
                } else {
                    $this->info("Importing company: " . $data[1]);
                    $company = array_combine($csvHeader, $data);
                    $company = new Company(CompanyDataFormatter::format($company));
                    $company->save();
                }
            }
        }

        $this->info("Companies imported successfully.");

        return self::SUCCESS;
    }
}