<?php

namespace Faker\Provider\ar_EG;

class Address extends \Faker\Provider\Address
{
    protected static $cityPrefix = [
        'شمال',
        'جنوب',
        'شرق',
        'غرب',
    ];

    protected static $streetPrefix = ['شارع', 'طريق', 'ممر'];

    /**
     * @see https://ar.wikipedia.org/wiki/%D8%AA%D8%B5%D9%86%D9%8A%D9%81:%D8%A3%D8%AD%D9%8A%D8%A7%D8%A1_%D8%A7%D9%84%D9%82%D8%A7%D9%87%D8%B1%D8%A9
     */
    protected static $cityName = [
        'التجمع الاول',
        'التجمع التالت',
        'التجمع الخامس',
        'الشروق',
        'الرحاب',
        'الجزيرة',
        'الحسين',
        'الزمالك',
        'السلام',
        'الظاهر',
        'العباسية',
        'المطرية',
        'الموسكي',
        'النزهة الجديدة',
        'السيدة زينب',
        'المرج',
        'المعادي',
        'المقطم',
        'المنيل',
        'الوايلي',
        'باب الشعرية',
        'باب اللوق',
        'ثكنات المعادي',
        'جاردن سيتي',
        'جسر السويس',
        'عابدين',
        'حدائق المعادي',
        'حلمية الزيتون',
        'حلوان',
        'الأزبكية',
        'الزاوية الحمراء',
        'الساحل',
        'مدينة نصر',
        'حدائق القبة',
        'شبرا',
        'عين شمس',
        'روكسي',
        'زهراء المعادي',
        'سراي القبة',
        'عبود',
        'عزبة النخل',
        'كوتسيكا',
        'الشيخ زايد',
        'السادس من اكتوير',
        'العاشر من رمضان',
        'المعصرة',
        'الزهراء',
        'غمرة',
        'المنيب',
        'فيصل',
        'الدقي',
        'العتبة',
        'المظلات',
        'المطار',
        'قباء',
        'ألف مسكن',
        'هليوبوليس',
        'هارون',
        'كلية البنات',
        'عبده باشا',
        'الجيش',
        'الكيت كات',
        'إمبابة',
    ];

    /**
     * @see https://ar.wikipedia.org/wiki/%D9%82%D8%A7%D8%A6%D9%85%D8%A9_%D9%85%D8%AD%D8%A7%D9%81%D8%B8%D8%A7%D8%AA_%D9%85%D8%B5%D8%B1
     */
    protected static $governorates = [
        'الإسكندرية',
        'الإسماعيلية',
        'أسوان',
        'أسيوط',
        'الأقصر',
        'البحر الأحمر',
        'البحيرة',
        'بني سويف',
        'بورسعيد',
        'جنوب سيناء',
        'الجيزة',
        'الدقهلية',
        'دمياط',
        'سوهاج',
        'السويس',
        'الشرقية',
        'شمال سيناء',
        'الغربية',
        'الفيوم',
        'القاهرة',
        'القليوبية',
        'قنا',
        'كفر الشيخ',
        'مطروح',
        'المنوفية',
        'المنيا',
        'الوادي الجديد',
    ];

    protected static $buildingNumber = ['%####', '%###', '%#'];

    protected static $postcode = ['#####', '#####-####'];

    /**
     * @see https://www.nationsonline.org/oneworld/countrynames_arabic.htm
     */
    protected static $country = [
        'الكاريبي', 'أمريكا الوسطى', 'أنتيجوا وبربودا', 'أنجولا', 'أنجويلا', 'أندورا', 'اندونيسيا', 'أورجواي', 'أوروبا', 'أوزبكستان', 'أوغندا', 'أوقيانوسيا', 'أوقيانوسيا النائية', 'أوكرانيا', 'ايران', 'أيرلندا', 'أيسلندا', 'ايطاليا',
        'بابوا غينيا الجديدة', 'باراجواي', 'باكستان', 'بالاو', 'بتسوانا', 'بتكايرن', 'بربادوس', 'برمودا', 'بروناي', 'بلجيكا', 'بلغاريا', 'بليز', 'بنجلاديش', 'بنما', 'بنين', 'بوتان', 'بورتوريكو', 'بوركينا فاسو', 'بوروندي', 'بولندا', 'بوليفيا', 'بولينيزيا', 'بولينيزيا الفرنسية', 'بيرو',
        'تانزانيا', 'تايلند', 'تايوان', 'تركمانستان', 'تركيا', 'ترينيداد وتوباغو', 'تشاد', 'توجو', 'توفالو', 'توكيلو', 'تونجا', 'تونس', 'تيمور الشرقية',
        'جامايكا', 'جبل طارق', 'جرينادا', 'جرينلاند', 'جزر الأنتيل الهولندية', 'جزر الترك وجايكوس', 'جزر القمر', 'جزر الكايمن', 'جزر المارشال', 'جزر الملديف', 'جزر الولايات المتحدة البعيدة الصغيرة', 'جزر أولان', 'جزر سليمان', 'جزر فارو', 'جزر فرجين الأمريكية', 'جزر فرجين البريطانية', 'جزر فوكلاند', 'جزر كوك', 'جزر كوكوس', 'جزر ماريانا الشمالية', 'جزر والس وفوتونا', 'جزيرة الكريسماس', 'جزيرة بوفيه', 'جزيرة مان', 'جزيرة نورفوك', 'جزيرة هيرد وماكدونالد', 'جمهورية افريقيا الوسطى', 'جمهورية التشيك', 'جمهورية الدومينيك', 'جمهورية الكونغو الديمقراطية', 'جمهورية جنوب افريقيا', 'جنوب آسيا', 'جنوب أوروبا', 'جنوب شرق آسيا', 'جنوب وسط آسيا', 'جواتيمالا', 'جوادلوب', 'جوام', 'جورجيا', 'جورجيا الجنوبية وجزر ساندويتش الجنوبية', 'جيبوتي', 'جيرسي',
        'دومينيكا',
        'رواندا', 'روسيا', 'روسيا البيضاء', 'رومانيا', 'روينيون',
        'زامبيا', 'زيمبابوي',
        'ساحل العاج', 'ساموا', 'ساموا الأمريكية', 'سانت بيير وميكولون', 'سانت فنسنت وغرنادين', 'سانت كيتس ونيفيس', 'سانت لوسيا', 'سانت مارتين', 'سانت هيلنا', 'سان مارينو', 'ساو تومي وبرينسيبي', 'سريلانكا', 'سفالبارد وجان مايان', 'سلوفاكيا', 'سلوفينيا', 'سنغافورة', 'سوازيلاند', 'سوريا', 'سورينام', 'سويسرا', 'سيراليون', 'سيشل',
        'شرق آسيا', 'شرق افريقيا', 'شرق أوروبا', 'شمال افريقيا', 'شمال أمريكا', 'شمال أوروبا', 'شيلي',
        'صربيا', 'صربيا والجبل الأسود',
        'طاجكستان',
        'عمان',
        'غامبيا', 'غانا', 'غرب آسيا', 'غرب افريقيا', 'غرب أوروبا', 'غويانا', 'غيانا', 'غينيا', 'غينيا الاستوائية', 'غينيا بيساو',
        'فانواتو', 'فرنسا', 'فلسطين', 'فنزويلا', 'فنلندا', 'فيتنام', 'فيجي',
        'قبرص', 'قرغيزستان', 'قطر',
        'كازاخستان', 'كاليدونيا الجديدة', 'كرواتيا', 'كمبوديا', 'كندا', 'كوبا', 'كوريا الجنوبية', 'كوريا الشمالية', 'كوستاريكا', 'كولومبيا', 'كومنولث الدول المستقلة', 'كيريباتي', 'كينيا',
        'لاتفيا', 'لاوس', 'لبنان', 'لوكسمبورج', 'ليبيا', 'ليبيريا', 'ليتوانيا', 'ليختنشتاين', 'ليسوتو',
        'مارتينيك', 'ماكاو الصينية', 'مالطا', 'مالي', 'ماليزيا', 'مايوت', 'مدغشقر', 'مصر', 'مقدونيا', 'ملاوي', 'منغوليا', 'موريتانيا', 'موريشيوس', 'موزمبيق', 'مولدافيا', 'موناكو', 'مونتسرات', 'ميانمار', 'ميكرونيزيا', 'ميلانيزيا',
        'ناميبيا', 'نورو', 'نيبال', 'نيجيريا', 'نيكاراجوا', 'نيوزيلاندا', 'نيوي',
        'هايتي', 'هندوراس', 'هولندا', 'هونج كونج الصينية',
        'وسط آسيا', 'وسط افريقيا',
    ];

    protected static $cityFormats = [
        '{{cityName}}',
    ];

    protected static $streetNameFormats = [
        '{{streetPrefix}} {{firstName}} {{lastName}}',
    ];

    protected static $streetAddressFormats = [
        '{{buildingNumber}} {{streetName}}',
        '{{buildingNumber}} {{streetName}} {{secondaryAddress}}',
    ];

    protected static $addressFormats = [
        "{{streetAddress}}\n{{city}}",
    ];

    protected static $secondaryAddressFormats = ['شقة رقم. ##', 'عمارة رقم ##'];

    /**
     * @example 'شرق'
     */
    public static function cityPrefix()
    {
        return static::randomElement(static::$cityPrefix);
    }

    /**
     * @example 'المعادي'
     */
    public static function cityName()
    {
        return static::randomElement(static::$cityName);
    }

    /**
     * @example 'شارع'
     */
    public static function streetPrefix()
    {
        return static::randomElement(static::$streetPrefix);
    }

    /**
     * @example 'شقة رقم. 350'
     */
    public static function secondaryAddress()
    {
        return static::numerify(static::randomElement(static::$secondaryAddressFormats));
    }

    /**
     * @example 'الإسكندرية'
     */
    public static function governorate()
    {
        return static::randomElement(static::$governorates);
    }
}
