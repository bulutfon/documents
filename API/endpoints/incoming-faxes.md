# Incoming Faxes

Kullanıcıya gelen faksların listelenip indirilebildiği endpointtir.

## URL'ler
* `GET /incoming-faxes.json` Gelen faksları listeler
* `GET /incoming-faxes/uuid` Id si verilen faksı .tiff formatında indirir.
* `GET /incoming-faxes/uuid/stream` Id si verilen faksı .tiff formatında stream eder.

### Örnek Sonuç

*/incoming-faxes?access_token=xxx*

```json
{
  "incoming_faxes": [
    {
      "uuid": "a3dbe5bc-6919-4197-a41d-7f5e94d6123b",
      "sender": 908508850000,
      "receiver": 8508850000,
      "created_at": "2014-04-19T21:52:52.721+03:00"
    },
    {
      "uuid": "a4ccf4f5-ae5f-4e2f-8b91-bf49d91d1c97",
      "sender": 908508850000,
      "receiver": 8508850000,
      "created_at": "2014-03-23T15:07:19.354+02:00"
    },
    {
      "uuid": "0bab4fc8-5ae9-4113-a74a-24178d099d72",
      "sender": 908508850000,
      "receiver": 8508850000,
      "created_at": "2014-03-23T15:00:56.214+02:00"
    }
  ]
}
```


### Dönen değerler

* **uuid:** Faksın bezersiz id'si
* **sender:** Faksı gönderen
* **receiver:** Faksın geldiği santral numarası
* **created_at:** Faksın geldiği zaman damgası
