<p align="center">
    <img src="https://serwer2077449.home.pl/knowledgespace.png" height="92" />
</p>

<p align="center">
<span style="font-size: 16px; color: #702afb; padding-right: 15px">Strona projektu</span>
<span style="font-size: 16px; color: #702afb; ">Ostatnia stabilna wersja: <b>0.3</b></span>
</p>

## Czym jest Knowledge Space?
Knowledge Space to Intranet dla Towarzystw Ubezpieczeniowych. Aplikacja pozwala na utworzenie repozytorium dokumentów dla ubezpieczeń inwestycyjnych, ochronnych oraz pracowniczych. W łatwy i szybko sposób można wyszukiwać dokumenty związane z produktami ubezpieczeniowymi Towarzystwa Ubezpieczeniowego.

W obecnej wersji aplikacji dostępne są następujące funkcjonalności:
- Użytkownicy (Rejestracja/logowanie/własne profile)
- Repozytorium produktowe dla ubezpieczeń: Inwestycyjnych, Ochronnych oraz Pracowniczych
- Możliwość określenia kategorii dla dokumentów oraz elastycznego powiązania dokumentu z ubezpieczeniami
- Aktualności
- Słownik partnerów/dystrybutorów Towarzystwa Ubezpieczeń
- Słownik ryzyk ubezpieczeniowych

System udostępnia jako open-source back-end aplikacji. Front-end (katalog /views oraz /public/css i /public/js nie są udostępnione w całości). W przypadku chęci uruchomienia/wykorzystania obecnej wersji aplikacji należy zaprogramować własny front-end aplikacji.

## Demo
Dane do zalogowania jako użytkownik:
E-mail: admin@admin.pl
Hasło: admin123

Link wkrótce :-)

## Instalacja
git clone https://github.com/pszewczykpl/knowledge-space.git
cd knowledge-space
copy .env.example .env
touch database/database.sqlite
composer install
php artisan key:generate
php artisan migrate --seed
php artisan server

## Licencja
Knowledge Space jest systemem open-source opartym o licencję MIT.
