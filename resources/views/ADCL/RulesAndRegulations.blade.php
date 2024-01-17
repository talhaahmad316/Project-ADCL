@extends('layouts.main')
@section('title', 'Rules & Regulations')
@section('contents')
<!DOCTYPE html>
<html lang="en">
   <!-- Basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- Mobile Metas -->
   <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
   <!-- Site Metas -->

   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- Site Icons -->
   <link rel="shortcut icon" href="" type="image/x-icon" />
   <link rel="apple-touch-icon" href="">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <!-- Site CSS -->
   <link rel="stylesheet" href="style.css">
   <!-- Colors CSS -->
   <link rel="stylesheet" href="css/colors.css">
   <!-- ALL VERSION CSS -->
   <link rel="stylesheet" href="css/versions.css">
   <!-- Responsive CSS -->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- Custom CSS -->
   <link rel="stylesheet" href="css/custom.css">
   <!-- font family -->
   <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'>
   <!-- end font family -->
   <link rel="stylesheet" href="css/3dslider.css" />
   <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
   <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
   <script src="js/3dslider.js"></script>

   <style>
    .text {
  position: relative;
  text-align: center;
  color: white;
}
.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-size: 50px;
  font-weight: bolder;
  font-family: oswald;
  text-shadow: 10px 10px 8px rgba(0, 0, 0, 0.5); /* Adjust values as needed */

}
</style>

<div style="margin-top: 14%;">

    <div class="text">
        <img src="images/orangecms.jpg" style="width: 100%; height:350px;" alt="">
        <div class="centered">Rules & Regulations ADCL</div>
    </div><br>


    <style>
        .container-fluid {
          display: flex;
        }

        .column {
          flex: 1;
          background: #F0F0F0;
          margin: 10px;
          padding: 10px;
          display: flex;
          align-items: flex-start;
        }

        .red-box {
          background: #f04414;
          color: white;
          width: 160%;
          height: 80px;
          text-align: center;
          display: flex;
          font-weight: bolder;
          font-family: oswald;
          justify-content: center;
          align-items: center;
          font-size: 28px; /* Adjust the font size as needed */
          margin-right: 10px;
        }

        .paragraph {
          flex-grow: 1;
          font-family: Roboto;
        }

      </style>

        <div class="container-fluid">
          <div class="column">
            <div class="red-box" style="width: 170%;">01</div>
            <div class="paragraph">
              <p style="text-align: left;">
                No ADCL member is allowed to play from any other club or tournament
                     without explicit permission of ADCL Manager or Core Council members, It
                     is to be noted that it is permission and not courtesy information. Failing
                     to take the permission or playing without or against the permission shall initiate Clause R3.</p>
            </div>
          </div>
          <div class="column">
            <div class="red-box" style="width: 200%;">02</div>
            <div class="paragraph">
              <p style="text-align: left;">With reference to “R1”, any player who shall play, within Abu Dhabi (State) a
                t any day, any time “A TOURNAMENT MATCH” from another Club/Team (Player’s own
                corporate team is not applicable, corporate means, the player must work there as
                 an employee, other than this no other corporate team shall be entertained),
                 shall not be eligible for the ADCL.</p>
            </div>
          </div>
          <div class="column">
            <div class="red-box" style="width: 200%;">03</div>
            <div class="paragraph">
              <p style="text-align: left;">With reference to “R1”, any player who shall play, within Abu Dhabi
                (State) at any day, any time “A TOURNAMENT MATCH” from another
                 Club/Team (Player’s own corporate team is not applicable,
                 corporate means, the player must work there as an employee,
                  other than this no other corporate team shall be entertained), shall not be eligible for the ADCL.</p>
            </div>
          </div>
        </div>


        <div class="container-fluid">
            <div class="column">
              <div class="red-box" style="width: 80%;">04</div>
              <div class="paragraph">
                <p style="text-align: left;">
                    Members not paying (unless they are excused by Manager or Core Council)
                    shall be warned and subsequently expelled from the club.</p>
              </div>
            </div>
            <div class="column">
              <div class="red-box" style="width: 215%;">05</div>
              <div class="paragraph">
                <p style="text-align: left;">Disrespect (Including foul language or jokes crossing the line) of any senior,
                    peer and junior shall not be tolerated, in case of any discipline issue reported by any member or
                    observed by any Core Council Member, Core Council shall investigate and pass on the judgement which can be acquittal,
                     warning, monitory fine or match(s) ban and even permanent/temporary expulsion from the club.</p>
              </div>
            </div>
            <div class="column">
              <div class="red-box" style="width: 120%;">06</div>
              <div class="paragraph">
                <p style="text-align: left;">In case a players misses a committed match whether practice or tournament
                     (or backs off less than 24 hrs of the match timing), Clause R3 shall be initiated for the particular member(s).</p>
              </div>
            </div>
          </div>


          <div class="container-fluid ">
            <div class="column">
              <div class="red-box" style="width: 60%;">07</div>
              <div class="paragraph">
                <p style="text-align: left;">
                    Defamation of the Club or any member infront of any other club or outsider shall initiate Clause-R4.</p>
              </div>
            </div>
            <div class="column">
              <div class="red-box" style="width: 65%;">08</div>
              <div class="paragraph">
                <p style="text-align: left;">Any damage or loss of ADCL Equipment shall result in Clause R3 initiation for the any particular member(s)</p>
              </div>
            </div>
            <div class="column">
              <div class="red-box" style="width: 80%;">09</div>
              <div class="paragraph">
                <p style="text-align: left;">All members are eligible for club activities participation, internal and external both, this includes Inter andIntra ADCL tournaments and Nets practice.

                </p>
              </div>
            </div>
          </div>


          <div class="container-fluid">
            <div class="column">
              <div class="red-box" style="width: 120%;">10</div>
              <div class="paragraph">
                <p style="text-align: left;">
                    <b style="font-size: 18px;">Captain / Team Manager</b><br>
                    The Captain and Core Council Member part of the team, is responsible at all times for ensuring that
                    play is conducted within the spirit of the game as well as within the laws. The Captain or CCM can instruct
                    a player to leave the field of play and take no further part in the game or make a complaint against a player after the game to the ADCL Core Council of ADCL Manager. Failure to
                    take suitable action against an offender may render the Captain or Manager liable to a charge of ‘Unsatisfactory Conduct’.</p>
              </div>
            </div>
            <div class="column">
              <div class="red-box" style="width: 100%;">11</div>
              <div class="paragraph">
                <p style="text-align: left;">
                    <b style="font-size: 18px;">Outstanding Disciplinary Action</b><br>
                    No player who is currently under suspension or involved in uncompleted disciplinary action
                    imposed by any other league or member club of another league may play in matches for ADCL. ADCL reserve the right to check
                    the disciplinary record of any player whom they intend to sign from a club in another league.
                     ADCL may refuse to register any player until the Club is satisfied that the player’s disciplinary status is acceptable.</p>
              </div>
            </div>
        </div>

            <div class="container-fluid ">
                <div class="column">
                  <div class="red-box" style="width: 15%;">10</div>
                  <div class="paragraph">
                    <p style="text-align: left;">
                        <b style="font-size: 18px;">Unsatisfactory conduct shall include, but not be limited to:</b><br>
                    –Dissent at an umpire’s decision or reaction in a provocative or disapproving manner, whether verbal or written. <br>
                    – Physical abuse, intimidation, assault or attempt to intimidate or assault an umpire, official, player or spectator.<br>
                    – The use of crude, foul or abusive language or the making of offensive gestures or hand signals whether directed at an individual or otherwise.<br>
                    – Sledging or deliberate distraction of an opponent and persisting appealing in order to pressurize an umpire or opponent.<br>
                    – Any form of abuse or discrimination relating to race, religion, creed or any other nature.<br>
                    – Willful damage to property, equipment or playing surface.<br>
                    – Conduct unbefitting of a gentleman or any other action that is likely to bring the Club or Game of Cricket into disrepute or prejudice its good name  or interests.<br>
                    – Repeated infringements of the Spirit of the Game, either by an individual or a team where each infringement in itself does not merit any immediate   disciplinary action. Such instances will result in a Disciplinary Hearing and the Captain will be held responsible for the conduct of his team.<br>
                    – Unacceptable behavior, by word or action, at any function organized by the Club.<br>
                    – Mistreatment or harassment of an individual or group either in person or via electronic equipment including, but not limited too, mobile phones, email and social networking sites.
                    </p>
                  </div>
                </div>
                </div>
@endsection
