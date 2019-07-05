# Bulutfon API Dokümantasyonu

**REST** mimarisinde tasarlanmış Bulutfon API'si, serileştirme için **JSON** kullanılabilir.

Endpointleri canlı ortamda deneyebileceğiniz [Bulutfon Api Dokümanını](http://api.bulutfon.com/docs) inceleyebilirsiniz.

## Kimlik Doğrulama ve Yetkilendirme

Bulutfon API'ye santral panelinizden bulabileceğiniz **token** ile erişim sağlayabilirsiniz.

### Master Token Kullanarak istek yapmak

Santral Paneli > Genel Ayarlar > Geliştirici Ayarları sayfasında ürettiğiniz Api Anahtarınızı istek sırasında `access_token` parametresi ile göndererek apiye doğrudan erişebilirsiniz.

    https://api.bulutfon.com/cdrs?access_token={{master_token}} // Şeklinde

## EndPoint'ler

* **[Me](https://github.com/bulutfon/documents/blob/master/API/endpoints/me.md)** - Santral, kullanıcı bilgileri
* **[Dids](https://github.com/bulutfon/documents/blob/master/API/endpoints/dids.md)** - Santrale bağlı telefon numaraları
* **[Extensions](https://github.com/bulutfon/documents/blob/master/API/endpoints/extensions.md)** - Dahililer
* **[Groups](https://github.com/bulutfon/documents/blob/master/API/endpoints/groups.md)** - Gruplar
* **[Cdrs](https://github.com/bulutfon/documents/blob/master/API/endpoints/cdr.md)** - Arama kayıtları
* **[Call Records](https://github.com/bulutfon/documents/blob/master/API/endpoints/call-records.md)** - Ses kayıtları
* **[Incoming Faxes](https://github.com/bulutfon/documents/blob/master/API/endpoints/incoming-faxes.md)** - Gelen fakslar
* **[Outgoing Faxes](https://github.com/bulutfon/documents/blob/master/API/endpoints/outgoing-faxes.md)** - Giden fakslar
* **[Announcements](https://github.com/bulutfon/documents/blob/master/API/endpoints/announcements.md)** - Ses Dosyaları
* **[Automatic Calls](https://github.com/bulutfon/documents/blob/master/API/endpoints/automatic-calls.md)** - Otomatik Aramalar
* **[Message Titles](https://github.com/bulutfon/documents/blob/master/API/endpoints/message-titles.md)** - Mesaj Başlıkları
* **[Messages](https://github.com/bulutfon/documents/blob/master/API/endpoints/messages.md)** - Mesajlar

## Masaüstü Uygulamada Token Almak

Masaüstü uygulamanızda token almak hali hazırda bir webserver olmadığı için sorun yaratmaktadır. Bunu çözmek için:

* Uygulama oluştururken yönlendirme adresini `urn:ietf:wg:oauth:2.0:oob` olarak tanımlayın.
* Desktop uygulamanızda kullanıcınızı link ile veya uygulamanızın içerisinde bir browser açarak standart akışta da bulunan erişim isteyeceğiniz adrese yönlendirin.
* Kullanıcın erişimi onayladıktan sonra, yetkilendirme kodunun yazdığı html bir sayfaya yönlendirilecektir.
* Kullanıcıdan gördüğü erişim anahtarını bir textbox'a kopyalayıp yapıştırmasını isteyip, ardından bu değişkeni `code` parametresi olarak kullanarak access token'ınızı alabilirsiniz.
* Bu işlem tek seferlik olacaktır. Access token'ı bir kez aldığınız zaman yenilemek için refresh token yetecektir.

## XML Değil Sadece JSON Desteği

Sadece JSON formatını destekliyoruz. 

## İstek Limitleri

[429 Too Many Requests](http://tools.ietf.org/html/draft-nottingham-http-new-status-02#section-4)

## HTTP Statü Kodları

## Kütüphaneler & SDK'lar

* [php-sdk](https://github.com/bulutfon/php-sdk) - Composer paketi
* [ruby-sdk](https://github.com/bulutfon/ruby-sdk) - Ruby Gem
* [.Net-SDK](https://github.com/bulutfon/dotNet-SDK) - .NET-SDK için Nuget Paketi

## Açık Kaynak Projeler

* [ProjeKod/BulutfonWoocommerce](https://github.com/Projekod/Bulutfon-WooCommerce-Eklentisi) - [Projekod](http://projekod.com/) firmasının yaptığı Bulutfon **Woocommerce** eklentisidir. 
* [Projekod/BulutfonCart](https://github.com/Projekod/Bulutfon-Opencart-Eklentisi) - [Projekod](http://projekod.com/) firmasının yaptığı Bulutfon **Opencart** eklentisidir. 
* [Projekod/BulutfonCart-Lite](https://github.com/Projekod/BulutfonCart-Lite) - [Projekod](http://projekod.com/) firmasının yaptığı [Opencart](http://www.opencart.com/index.php?route=extension/extension/info&extension_id=21996) eklentisi. **ESKİ SÜRÜM**
* [hakanersu/bulutfon-whmcs](https://github.com/hakanersu/bulutfon-whmcs) - [Hakan Ersu](https://github.com/hakanersu)  tarafından geliştirdiği [Whmcs](http://whmcs.com/) eklentisi.

## Nasıl Yapılır Kılavuzları

* [Php, Curl kullanılarak Bulutfon'la SMS gönderme uygulaması](https://www.bulutfon.com/gelistirici-makaleleri/api/php-curl-kullanilarak-bulutfonla-sms-gonderme-uygulamasi)
* [Php, Curl ile Bulutfon API'sini kullanarak dahili listesini göstermek](https://www.bulutfon.com/gelistirici-makaleleri/api/php-curl-ile-bulutfon-apisini-kullanarak-dahili-listesini-gostermek)
* [Php, Curl, Bulutfon API'yi kullanarak gelen faksların listelenmesi](https://www.bulutfon.com/gelistirici-makaleleri/api/php-curl-bulutfon-apiyi-kullanarak-gelen-fakslarin-listelenmesi)
* [Php, Curl, Bulutfon API'yi kullanarak fax gönderme İşlemi](https://www.bulutfon.com/gelistirici-makaleleri/api/php-curl-bulutfon-apiyi-kullanarak-fax-gonderme-islemi)
* [Php, Curl, Bulutfon API'yi kullanarak gönderilen faxların listelenmesi](https://www.bulutfon.com/gelistirici-makaleleri/api/php-curl-bulutfon-apiyi-kullanarak-gelen-fakslarin-listelenmesi)
* [PHP, Curl, Bulutfon Apiyi Kullanarak Arama Kayıtlarının Çekilmesi](https://www.bulutfon.com/gelistirici-makaleleri/api/php-curl-bulutfon-apiyi-kullanarak-arama-kayitlarinin-cekilmesi)

## Daha iyisini yapmamız için geri bildirimde bulunun!

Lütfen bizlere daha iyi bir API'yi nasıl yapacağımızı söyleyin, geri bildirimde bulunun. Eğer API'de bir özelliğe ihtiyacınız varsa veya bir hata bulduysanız, lütfen [geliştirici formuna](http://devforums.bulutfon.com/c/api) konu açın. 
