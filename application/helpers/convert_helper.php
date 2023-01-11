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
    if (!function_exists('getRomawi')) {

        function getRomawi($bln)
        {

            switch ($bln) {

                case 'A':

                    return "I";

                    break;

                case 'B':

                    return "II";

                    break;

                case 'C':

                    return "III";

                    break;

                case 'D':

                    return "IV";

                    break;

                case 'E':

                    return "V";

                    break;

                case 'F':

                    return "VI";

                    break;

                case 'G':

                    return "VII";

                    break;

                case 'H':

                    return "VIII";

                    break;

                case 'I':

                    return "IX";

                    break;

                case 'J':

                    return "X";

                    break;

                case 'K':

                    return "XI";

                    break;

                case 'L':

                    return "XII";

                    break;
            }
        }
    }
    ?>