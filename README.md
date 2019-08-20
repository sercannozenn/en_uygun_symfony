# En Uygun Kur Değerini Getirme / Symfony Projesi 

<p>Veri tabanı oluşturmak için <b>Migration</b> yapısı kullanılmıştır. Öncelikle migration işlemleri yapılmalıdır. </p><br>

Veri tabanında 2 Tablo oluşturulmuştur. 1. tablo providerların(api - url) tutulduğu, 2. tablo da para birimlerinin ve değerlerinin tutulduğu tablolardır.

Providerlar seed yöntemi yani AppFixtures ile veri tabanına yazılmıştır. 
<pre>php bin/console doctrine:fixtures:load</pre> kodu çalıştırılarak veriler ilk çalıştırmada yazdırılmalıdır. 
