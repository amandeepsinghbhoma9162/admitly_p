<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Agent\Student;
use App\Agent;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;

class UsersImport implements ToModel
{   

    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Check if the necessary columns exist before accessing them
        $companyName = isset($row[1]) ? $row[1] : null;
        $firstName = isset($row[0]) ? $row[0] : null;
        $appliedAt = isset($row[2]) ? $row[2] : null;
        // Only proceed if the mandatory fields are present
        if ($companyName && $firstName) {
            // Find the Agent ID based on company name from the Excel row
            $agent = Agent::where('company_name', 'like', '%'.$companyName.'%')->first();
            if($agent == null){
                $agent = Agent::where('company_name', $companyName)->first();
            }
            $agentId = $agent ? $agent->id : null;
            // Create and return a new Student model instance
            if ($agent) {
                return new Student([
                    'agent_id' => $agentId,
                    'firstName' => $firstName,
                    'applingForCountry' => '38',  // Static value, adjust if needed
                    'applingForLevel' => '16',    // Static value, adjust if needed
                    'lock_status' => '1',         // Static value, adjust if needed
                    'email_applications' => '1',  // Static value, adjust if needed
                    'applied_at' => $appliedAt,
                ]);
            }
            return null;
        }

        // If the necessary data isn't present, return null to skip this row
        return null;
    }
}
