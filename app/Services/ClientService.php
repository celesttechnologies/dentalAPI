<?PHP
namespace App\Services;

use App\Models\Client;
use Illuminate\Pagination\LengthAwarePaginator;

class ClientService
{
    public function getClients(int $perPage): array
    {
        $clients = Client::paginate($perPage);

        return [
            'clients' => $clients->items(),
            'pagination' => [
                'current_page' => $clients->currentPage(),
                'per_pages' => $clients->perPages(),
                'total' => $clients->total(),
            ]
        ];
    }

    /**
     * Create a new client record.
     *
     * @param array $data The validated data for creating the client
     * @return Client The newly created client model
     */
    public function createClient(array $data): Client
    {
        return Client::create($data);
    }

    /**
     * Update an existing client record.
     *
     * @param Client $client The client model to update
     * @param array $data The validated data for updating the client
     * @return Client The updated client model
     */
    public function updateClient(Client $client, array $data): Client
    {
        $client->update($data);
        return $client;
    }
}
