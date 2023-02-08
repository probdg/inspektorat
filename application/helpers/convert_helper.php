 <?php
    if (!function_exists('number_to_str')) {
        function  number_to_str($number)
        {
            $convertion = [
                1 => 'a',
                2 => 'b',
                3 => 'c',
                4 => 'd',
                5 => 'e',
                6 => 'f',
                7 => 'g',
                8 => 'h',
                9 => 'i',
                0 => 'j'
            ];
            $array_data = str_split($number);
            $new_data   = '';

            foreach ($array_data as  $value) {
                $new_data .= $convertion[$value] . "";
            }
            return $new_data;
        }
    }
    if (!function_exists('str_to_number')) {
        function str_to_number($string)
        {
            $convertion = [
                'a' => 1,
                'b' => 2,
                'c' => 3,
                'd' => 4,
                'e' => 5,
                'f' => 6,
                'g' => 7,
                'h' => 8,
                'i' => 9,
                'j' => 0
            ];
            $string     = strtolower($string);
            $array_data = str_split($string);
            $new_data   = '';
            foreach ($array_data as  $value) {
                $new_data .= $convertion[$value] . "";
            }
            return $new_data;
        }
    }
    if (!function_exists('str_to_number')) {
        function str_to_number($string)
        {
            $convertion = [
                'a' => 1,
                'b' => 2,
                'c' => 3,
                'd' => 4,
                'e' => 5,
                'f' => 6,
                'g' => 7,
                'h' => 8,
                'i' => 9,
                'j' => 0
            ];
            $string     = strtolower($string);
            $array_data = str_split($string);
            $new_data   = '';
            foreach ($array_data as  $value) {
                $new_data .= $convertion[$value] . "";
            }
            return $new_data;
        }
    }
    if (!function_exists('celah')) {
        function celah($string)
        {
            $convertion = [
                '1' => '(1) Kebijakan dan Prosedur pengendalian sudah dilakukan, namun belum mampu menangani risiko yang teridentifikasi',
                '2' => '(2) Prosedur pengendalian belum/tidak dapat dilaksanakan',
                '3' => '(3) Kebijakan belum diikuti dengan prosedur baku yang jelas',
                '4' => '(4) Kebijakan dan prosedur yang ada tidak sesuai dengan peraturan diatasnya'
            ];
            $string     = strtolower($string);
            $array_data = str_split($string);
            $new_data   = '';
            foreach ($array_data as  $value) {
                $new_data .= $convertion[$value] . "";
            }
            return $new_data;
        }
    }
    if (!function_exists('getRomawi')) {
        /**
         * @param int $number
         * @return string
         */
        function getRomawi($number)
        {
            $map = array(
                'M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400,
                'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40,
                'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1
            );
            $returnValue = '';
            while ($number > 0) {
                foreach ($map as $roman => $int) {
                    if ($number >= $int) {
                        $number -= $int;
                        $returnValue .= $roman;
                        break;
                    }
                }
            }
            return $returnValue;
        }
    }
    ?>