# Önemli Duyuru

Firmamız Ocak 2020 itibariyle APIv2 sürümünü yayına almıştır. Yeni yapacagınız geliştirmelerde APIv1 degil APIv2 kullanmanız şiddet ile tavsiye ediyoruz. 

* APIv2 Dokümanı https://api.bulutfon.com/docs
* Blog Yazımız https://www.bulutfon.com/bulutfon-api-v2-nin-yayinlanmasi/ 
* APIv2 ile ilgili blog yazıları https://www.bulutfon.com/tag/apiv2/

Github'daki API doküman tamamen APIv1 üzerinedir. Yukarıdaki linkleri takip etmenizi öneriyoruz. BulutfonXM ve Webkancalarıyla ilgili bir degisiklik olmamıştır. Sadece APIv1 güncellenmiştir.

# Bulutfon API Dokümantasyonu

**REST** mimarisinde tasarlanmış Bulutfon API'si, serileştirme için **JSON**, yetkilendirme için **username** **password** veya **token** kullanılabilir.

Endpointleri canlı ortamda deneyebileceğiniz [Bulutfon Api Dokümanını](http://api.bulutfon.com/docs) inceleyebilirsiniz.

## Kimlik Doğrulama ve Yetkilendirme

Bulutfon'da API'ye iki tip login olma yöntemi vardır.

1. Kullanıcı adı (yani epostanız) ve şifreniz ile
2. Sistemden alacağınız tekil bir anahtar(token) ile

### Kullanıcı adı (email) ve şifre ile istek yapma

İsteklerinizi master token kullanmak yerine giriş bilgilerinizi kullanarak yapmak isterseniz, Email adresinizi ve şifrenizi istek sırasında `email` ve `password` parametrelerii ile göndererek apiye doğrudan erişebilirsiniz.

    https://api.bulutfon.com/cdrs?email={{email}}&password={{password}} // ŞeklindeErişim

### Master Token Kullanarak istek yapmak

İsteklerinizi master token kullanarak yapmak isterseniz, [Bulutfon Santral Paneli > Genel Ayarlar > Geliştirici Seçenekleri](https://oim.bulutfon.com/account/pbx-settings/general-settings) sayfasından aldığınız tokenı istek sırasında `access_token` parametresi ile göndererek apiye doğrudan erişebilirsiniz.

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

* [Geliştirici Bilgi Bankası](https://www.bulutfon.com/category/blog/api-entegrasyon/)
* [Php, Curl kullanılarak Bulutfon'la SMS gönderme uygulaması](https://www.bulutfon.com/php-curl-kullanilarak-bulutfon-ile-sms-gonderme-uygulamasi/)
* [Php, Curl ile Bulutfon API'sini kullanarak dahili listesini göstermek](https://www.bulutfon.com/php-curl-ile-bulutfon-apisini-kullanarak-dahili-listesini-gostermek/)
* [Php, Curl, Bulutfon API'yi kullanarak gelen faksların listelenmesi](https://www.bulutfon.com/php-curl-bulutfon-api-kullanarak-gelen-fakslari-listeleme/)
* [Php, Curl, Bulutfon API'yi kullanarak fax gönderme İşlemi](https://www.bulutfon.com/php-curl-bulutfon-api-kullanarak-fax-gonderme-islemi/)
* [Php, Curl, Bulutfon API'yi kullanarak gönderilen faxların listelenmesi](https://www.bulutfon.com/php-curl-bulutfon-api-kullanarak-gonderilen-faxlarin-listelenmesi/)
* [PHP, Curl, Bulutfon Apiyi Kullanarak Arama Kayıtlarının Çekilmesi](https://www.bulutfon.com/php-curl-bulutfon-api-kullanarak-arama-kayitlarinin-cekilmesi/)

## Daha iyisini yapmamız için geri bildirimde bulunun!

Lütfen bizlere daha iyi bir API'yi nasıl yapacağımızı söyleyin, geri bildirimde bulunun. Eğer API'de bir özelliğe ihtiyacınız varsa veya bir hata bulduysanız, lütfen [geliştirici formuna](http://devforums.bulutfon.com/c/api) konu açın. 
