<div class="con_main">
    <div class="container">
        <div class="account">
            <h2>Lottery</h2>
            <div class="account_box">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="my_account">
                            
                            <h2>U.S. Mega Millions+MB</h2>
<!--                            <p>Apply  Official Tickets for U.S. Mega Millions Lottery Online</p>
                            <p><i class="fa fa-info-circle"></i>If you do not have a saved set of numbers that fits the rules of your lottery subscription, the system will use your default numbers.</p>-->
                            
                            <div class="numberselector">

                                <div class="numberselector_right">
                                       <div id="result"> </div>
                                       <div id="result_a">Choose 5</div>
                                       <div class="col-sm-6">
                                        <div id="myTable">
                                            <!--1st ROW-->
                                            <ul>
                                                <li>1</li>
                                                <li>2</li>
                                                <li>3</li>
                                                <li>4</li>
                                                <li>5</li>
                                                <li>6</li>
                                                <li>7</li>
                                                <li>8</li>
                                                <li>9</li>
                                                <li>10</li>
                                                <li>11</li>
                                                <li>12</li>
                                                <li>13</li>
                                                <li>14</li>
                                                <li>15</li>
                                                <li>16</li>
                                                <li>17</li>
                                                <li>18</li>
                                                <li>19</li>
                                                <li>20</li>

                                                <li>21</li>
                                                <li>22</li>
                                                <li>23</li>
                                                <li>24</li>
                                                <li>25</li>
                                                <li>26</li>
                                                <li>27</li>
                                                <li>28</li>
                                                <li>29</li>
                                                <li>30</li>

                                                <li>31</li>
                                                <li>32</li>
                                                <li>33</li>
                                                <li>34</li>
                                                <li>35</li>
                                                <li>36</li>
                                                <li>37</li>
                                                <li>38</li>
                                                <li>39</li>
                                                <li>40</li>

                                                <li>41</li>
                                                <li>42</li>
                                                <li>43</li>
                                                <li>44</li>
                                                <li>45</li>
                                                <li>46</li>
                                                <li>47</li>
                                                <li>48</li>
                                                <li>49</li>
                                                <li>50</li>

                                                <li>51</li>
                                                <li>52</li>
                                                <li>53</li>
                                                <li>54</li>
                                                <li>55</li>
                                                <li>56</li>
                                                <li>57</li>
                                                <li>58</li>
                                                <li>59</li>
                                                <li>60</li>

                                                <li>61</li>
                                                <li>62</li>
                                                <li>63</li>
                                                <li>64</li>
                                                <li>65</li>
                                                <li>66</li>
                                                <li>67</li>
                                                <li>68</li>
                                                <li>69</li>
                                                <li>70</li>

                                                <li>71</li>
                                                <li>72</li>
                                                <li>73</li>
                                                <li>74</li>
                                                <li>75</li>

                                            </ul>
                                        </div>
                                       </div>
                                       
                                      
                                       <div id="result1"> </div>
                                       <div id="result1_a">Choose 1</div>
                                       <div class="col-sm-6">
                                       
                                        <div id="myTable1">
                                            <!--1st ROW-->
                                            <ul>
                                                <li>1</li>
                                                <li>2</li>
                                                <li>3</li>
                                                <li>4</li>
                                                <li>5</li>
                                                <li>6</li>
                                                <li>7</li>
                                                <li>8</li>
                                                <li>9</li>
                                                <li>10</li>
                                                <li>11</li>
                                                <li>12</li>
                                                <li>13</li>
                                                <li>14</li>
                                                <li>15</li>
                                                
                                            </ul>
                                        </div>
                                       </div>
                                       
                                </div>

                            </div>
                        </div>
                       
                    </div>
                     <?php echo $this->Form->create('Lottery');  
                    
                    echo $this->Form->input('usmegamellion', array('type'=>'hidden','id'=>'usin'));
                    echo $this->Form->input('usmegapowerball', array('type'=>'hidden','id'=>'uspb'));
                    echo $this->Form->end('Submit');
                    
                    ?>

                </div>
            </div>

        </div>

    </div>
</div>
 <script type="text/javascript">
                                        var BlockVM = function() {
                                            var me = this;
                                            me.selectedOne = [];
                                            me.countLock = 5;
                                            me.sortSelectedOne = function() {
                                                me.selectedOne = me.selectedOne;
                                            };
                                            me.colorize = function() {
                                                var m = me;
                                                $("#myTable li").each(function() {
                                                    var v = $(this).html();
                                                    var flag = _.find(m.selectedOne, function(num) {
                                                        return num == v;
                                                    });
                                                    if (flag != undefined) {
                                                        $(this).addClass('chgnnode');
                                                    } else {
                                                        $(this).removeClass('chgnnode');
                                                    }
                                                });
                                                $("#result_a").html("Choose: " + parseInt(m.countLock - m.selectedOne.length, 10));
                                               // console.log("Left: " + parseInt(m.countLock - m.selectedOne.length, 10));
                                               // console.log("Filled: " + m.selectedOne.length);
                                            }
                                            me.init = function() {
                                                var m = me;
                                                $("#myTable li").off('click').on('click', function() {


                                                    var v = parseInt($(this).html(), 10);
                                                    var flag = _.find(m.selectedOne, function(num) {
                                                        return num == v;
                                                    });
                                                    if (flag == undefined) {
                                                        if (m.selectedOne.length != me.countLock) {
                                                            m.selectedOne.push(v);
                                                        }
                                                    } else {
                                                        m.selectedOne = _.without(m.selectedOne, v);
                                                    }
                                                    m.sortSelectedOne();
                                                    $("#result").html("Your Lucky No: " + m.selectedOne.toString());
                                                    $("#usin").val(m.selectedOne.toString());
                                                    m.colorize();
                                                });
                                            }
                                            me.init();
                                        }
                                     var BlockVMA =function(){
                                            var me = this;
                                            me.selectedOne = [];
                                            me.countLock = 1;
                                            me.sortSelectedOne = function() {
                                                me.selectedOne = me.selectedOne;
                                            };
                                            me.colorize = function() {
                                                var m = me;
                                                $("#myTable1 li").each(function() {
                                                    var v = $(this).html();
                                                    var flag = _.find(m.selectedOne, function(num) {
                                                        return num == v;
                                                    });
                                                    if (flag != undefined) {
                                                      $(this).addClass('chgnnode');
                                                    } else {
                                                         $(this).removeClass('chgnnode');
                                                    }
                                                });
                                                $("#result1_a").html("Choose: " + parseInt(m.countLock - m.selectedOne.length, 10));
                                               // console.log("Left: " + parseInt(m.countLock - m.selectedOne.length, 10));
                                               // console.log("Filled: " + m.selectedOne.length);
                                            }
                                            me.init = function() {
                                                var m = me;
                                                $("#myTable1 li").off('click').on('click', function() {


                                                    var v = parseInt($(this).html(), 10);
                                                    var flag = _.find(m.selectedOne, function(num) {
                                                        return num == v;
                                                    });
                                                    if (flag == undefined) {
                                                        if (m.selectedOne.length != me.countLock) {
                                                            m.selectedOne.push(v);
                                                        }
                                                    } else {
                                                        m.selectedOne = _.without(m.selectedOne, v);
                                                    }
                                                    m.sortSelectedOne();
                                                    $("#result1").html("Your Lucky No: " + m.selectedOne.toString());
                                                     $("#uspb").val(m.selectedOne.toString());
                                                    m.colorize();
                                                });
                                            }
                                            me.init();
                                     }
                                        $(document).ready(function() {
                                            
                                            blkObj = new BlockVM();
                                            blkObj = new BlockVMA();
                                            
                                            $("#myTable li").css('cursor', 'pointer');
                                            $("#myTable1 li").css('cursor', 'pointer');
                                        });
                                        

                                    </script>
                                    <style type="text/css">
                                        #myTable {
                                            border: 1px solid #000;
                                            border-radius: 5px;
                                            float: left;
                                            margin: 0;
                                            padding: 5px;
                                            width: 100%;
                                            background: url(".../images/nav_bg.jpg") repeat scroll 0 0 #f8f8f8;
                                        }
                                        #myTable ul{
                                            margin: 0px;
                                            width: 100%;
                                            float: left;
                                            padding: 0px;
                                        }
                                       #myTable ul li {
                                            border: 1px solid #000;
                                            box-shadow: 2px 2px 0 #252e33;
                                            display: inline;
                                            float: left;
                                            height: 28px;
                                            list-style: outside none none;
                                            margin: 0;
                                            padding: 4px 0 0;
                                            text-align: center;
                                            width: 32.4px;
                                            color: #000;
                                        }
                                        
                                        #myTable1 {
                                            border: 1px solid #000;
                                            border-radius: 5px;
                                            float: left;
                                            margin: 0;
                                            padding: 5px;
                                            width: 100%;
                                            background: #ff0000;
                                        }
                                        #myTable1 ul{
                                            margin: 0px;
                                            width: 100%;
                                            float: left;
                                            padding: 0px;
                                        }
                                       #myTable1 ul li {
                                            border: 1px solid #000;
                                            box-shadow: 2px 2px 0 #252e33;
                                            display: inline;
                                            float: left;
                                            height: 28px;
                                            list-style: outside none none;
                                            margin: 0;
                                            padding: 4px 0 0;
                                            text-align: center;
                                            width: 32.4px;
                                            color: #fff;
                                        }
                                        
                                        .chgnnode
                                        {
                                cursor: pointer;
                                color: rgb(255, 255, 255);
                                border: 1px solid rgb(49, 95, 185);
                                box-shadow: rgb(0, 0, 0) 1px 1px 4px inset;
                                background-color: rgb(0, 129, 221);
                                        }
                                    </style>