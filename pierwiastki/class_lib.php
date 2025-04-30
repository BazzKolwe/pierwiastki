<?php
//Nie wszystko ma sens tutaj

class obliczenia {
    
    public $masa;
    public $atom;        
    public $alpha;
    public $beta;
    public $tablica;
    public function __construct($masa,$atom,$alpha,$beta){
          
            $this->masa  = $masa;
            $this->atom  = $atom;
            $this->alpha = $alpha;
            $this->beta  = $beta;
            $this->tablica = array(

                "H","He","Li","Be","B","C","N","O","F","Ne","Na","Mg","Al","Si","P","S","Cl","Ar","K","Ca","Sc","Ti","V","Cr","Mn","Fe","Co","Ni","Cu","Zn","Ga","Ge","As","Se","Br","Kr","Rb","Sr","Y","Zr","Nb","Mo","Tc","Ru","Rh","Pd","Ag","Cd","In","Sn","Sb","Te","I","Xe","Cs","Ba","La","Ce","Pr","Nd","Pm","Sm","Eu","Gd","Tb","Dy","Ho","Er","Tm","Yb","Lu","Hf","Ta","W","Re","Os","Ir","Pt","Au","Hg","Tl","Pb","Bi","Po","At","Rn","Fr","Ra","Ac","Th","Pa","U","Np","Pu","Am","Cm","Bk","Cf","Es","Fm","Md","No","Lr","Rf","Db","Sg","Bh","Hs","Mt","Ds","Rg","Cn","Nh","Fl","Mc","Lv","Ts","Og"
                
                     );
  
    }
    function roznica() {
        // if($this->atom >118){
        //     echo "liczba atomowa wynosi ponad 118 <br />";
        //     $this->atom = 118;
        // }
    if ($this->masa >0 && $this->atom>0){

        

        // sprawdzanie czy masa >= atomowej
        if($this->masa >= $this->atom){

            echo '<div class="wyniki">';
            //wypisanie piewiastka
            echo "pierwiastkiem początkowym jest: ";
            echo "   
            <math>
            <msubsup>
            <mi>" . $this->tablica[$this->atom  -1] .
            "</mi> <mi>". $this->atom .
            "</mi> <mi>". $this->masa . 
            "</mi> </msubsup> </math> <br />";
             echo '</div>';           

            
            //return " jest"; 
        }
        else{
        return "nie jest"; //ok
        }
    }
    else return "niepoprawna liczba"; //ok
    }

    function rozpad(){

        if($this->masa <0){
            return "niepoprawna liczba masowa ";
        }
        elseif($this->atom <0){
            return "niepoprawna liczba atomowa ";
        }
        else{
            //echo "dodatnia liczba <br/> ";
        }
    
    
    
         $zt = 0;
        while ($this->alpha + $this->beta > 0){

            if ( $zt % 2 == 0 && $this->alpha > 0)
            {
            echo"Rozpad Alpha: "; 
            $this->alpha--;
            $this->masa -= 4; 
            $this->atom -= 2;
            $zt++;

            if($this->masa == 1)
            {
                echo "   
                <math>
                <msubsup>
                <mi>" . $this->tablica[$this->atom -1] .
                "</mi> <mi>". $this->atom .
                "</mi> <mi>". $this->masa . 
                "</mi> </msubsup> </math> <br />";
                echo "niepoprawna masa";
                return "niepoprawna masa";
                
            }
            elseif($this->masa <=0)
            {
                echo "   
                <math>
                <msubsup>
                <mi>" .  $this->tablica[$this->atom -1]  .
                "</mi> <mi>". $this->atom +2 .
                "</mi> <mi>". $this->masa +4 . 
                "</mi> </msubsup> </math> <br />";

                echo " Ostatni poprawny pierwiastek:  
                <math>
                <msubsup>
                <mi>" .  $this->tablica[$this->atom -1]  .
                "</mi> <mi>". $this->atom +2 .
                "</mi> <mi>". $this->masa +4 . 
                "</mi> </msubsup> </math> <br />";
                return "niedodatnia  masa";
            }


            echo "   
            <math>
            <msubsup>
            <mi>" . $this->tablica[$this->atom -1] .
            "</mi> <mi>". $this->atom .
            "</mi> <mi>". $this->masa . 
            "</mi> </msubsup> </math> <br />";


            
            }
            elseif( $zt % 2 == 1 && $this->beta > 0){
            echo "Rozpad Beta: ";
            $this->beta--;
            $this->atom += 1;
            $zt++;

            echo "   
            <math>
            <msubsup>
            <mi>" . $this->tablica[$this->atom -1] .
            "</mi> <mi>". $this->atom .
            "</mi> <mi>". $this->masa . 
            "</mi> </msubsup> </math> <br />";

            

            }
            else{
                $zt++;
            }
        }       
        if($this->atom == 1 && $this->masa == 0)
        {

        echo "pierwiastkiem ostatecznym jest: "; 
    echo "   
    <math>
    <msubsup>
    <mi>" . "n" .
    "</mi> <mi>". $this->atom - 2 * $this->alpha + $this->beta  .
    "</mi> <mi>". $this->masa - 4 * $this->alpha  . 
    "</mi> </msubsup> </math> ";

}
elseif($this->atom == 0 && $this->masa == 0){
echo "pusty pierwiastek";
}
elseif($this->atom == 0 && $this->masa == 1){

    echo "pierwiastkiem ostatecznym jest: "; 
    echo "   
    <math>
    <msubsup>
        <mi>" . "p" .
        "</mi> <mi>". $this->atom - 2 * $this->alpha + $this->beta  .
        "</mi> <mi>". $this->masa - 4 * $this->alpha  . 
        "</mi> </msubsup> </math> ";
    }
else{
    echo "pierwiastkiem ostatecznym jest: "; 


    echo "   
    <math>
    <msubsup>
        <mi>" . $this->tablica[$this->atom - 2 * $this->alpha -1] .
        "</mi> <mi>". $this->atom - 2 * $this->alpha + $this->beta  .
        "</mi> <mi>". $this->masa - 4 * $this->alpha  . 
        "</mi> </msubsup> </math> ";
    }   
        
    exit;
        
        
    }


   
}

?>