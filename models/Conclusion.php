<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%conclusion}}".
 *
 * @property integer $ID
 * @property string $DepartID
 * @property string $ModuleType
 * @property string $Type
 * @property string $Year
 * @property string $FlowNumber
 * @property string $CaseNumber
 * @property string $Case
 * @property string $SubjectMatter
 * @property string $LitigantOne
 * @property string $LitigantTwo
 * @property string $TransferMaterial
 * @property string $Supervise
 * @property string $Chambers
 * @property string $Agency
 * @property string $JudgmentExecuteReceives
 * @property string $TropschOffice
 * @property integer $SendCycle
 * @property string $SendDate
 * @property integer $EntrustCycle
 * @property string $MaterialsCompletionDate
 * @property string $GetbackDate
 * @property integer $Cycle
 * @property string $Result
 * @property string $Price
 * @property integer $UnitID
 * @property string $InputMan
 * @property string $InputDate
 * @property string $EditMan
 * @property string $EditDate
 * @property string $Remark
 * @property string $EntrustDeparment
 * @property string $ChoiceWay
 * @property string $Money
 * @property integer $IsAdoption
 * @property string $FllowResult
 * @property string $Time1
 * @property string $Status1
 * @property string $Price1
 * @property string $Time2
 * @property string $Status2
 * @property string $Price2
 * @property string $Time3
 * @property string $Status3
 * @property string $Price3
 * @property string $Time4
 * @property string $BeginDate
 * @property string $IdentifiedType
 * @property string $IdentifiedCondition
 * @property string $ChoicedDate
 * @property string $FirstDraftDate
 * @property string $AnnouncementDate1
 * @property string $StartAuctionPrice1
 * @property string $AnnouncementDate2
 * @property string $StartAuctionPrice2
 * @property string $AnnouncementDate3
 * @property string $StartAuctionPrice3
 * @property string $NotifyPaymentDate
 * @property string $ChargesDate
 * @property string $SiteSurveyDate
 * @property string $IdentifiedResult
 * @property string $Unadoption
 * @property string $SourceIdentifiedDepartment
 * @property string $SourceIdentifiedResult
 * @property string $UndertakerTel
 * @property string $SuperviseTel
 * @property string $TotalDate
 * @property string $AuctionStatus
 * @property string $AuctionPrice
 * @property string $AuctionDate
 * @property string $SuspendedDate
 * @property string $Assessor
 * @property string $AssessorTel
 * @property string $DeliveryCourtDate
 * @property string $SaleDate
 * @property string $SalePrice
 * @property string $SaleStatus
 * @property string $RetractDate
 * @property string $TranVersion
 */
class Conclusion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%conclusion}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DepartID', 'ModuleType', 'Type', 'Year', 'FlowNumber', 'CaseNumber', 'Case'], 'required'],
            [['DepartID', 'Price', 'Money', 'Price1', 'Price2', 'Price3', 'StartAuctionPrice1', 'StartAuctionPrice2', 'StartAuctionPrice3', 'AuctionPrice', 'SalePrice'], 'number'],
            [['SubjectMatter', 'IdentifiedCondition', 'IdentifiedResult'], 'string'],
            [['JudgmentExecuteReceives', 'TropschOffice', 'SendDate', 'MaterialsCompletionDate', 'GetbackDate', 'InputDate', 'EditDate', 'Time1', 'Time2', 'Time3', 'Time4', 'BeginDate', 'ChoicedDate', 'FirstDraftDate', 'AnnouncementDate1', 'AnnouncementDate2', 'AnnouncementDate3', 'NotifyPaymentDate', 'ChargesDate', 'SiteSurveyDate', 'TotalDate', 'AuctionDate', 'SuspendedDate', 'DeliveryCourtDate', 'SaleDate', 'RetractDate'], 'safe'],
            [['SendCycle', 'EntrustCycle', 'Cycle', 'UnitID', 'IsAdoption'], 'integer'],
            [['ModuleType'], 'string', 'max' => 25],
            [['Type', 'Result', 'InputMan', 'EditMan', 'ChoiceWay', 'Status1', 'Status2', 'Status3', 'IdentifiedType', 'AuctionStatus', 'SaleStatus'], 'string', 'max' => 10],
            [['Year'], 'string', 'max' => 12],
            [['FlowNumber', 'CaseNumber', 'Case', 'TransferMaterial', 'EntrustDeparment', 'FllowResult', 'UndertakerTel', 'SuperviseTel'], 'string', 'max' => 50],
            [['LitigantOne', 'LitigantTwo', 'SourceIdentifiedResult'], 'string', 'max' => 200],
            [['Supervise', 'Chambers', 'Assessor', 'AssessorTel'], 'string', 'max' => 20],
            [['Agency', 'Remark'], 'string', 'max' => 100],
            [['Unadoption', 'SourceIdentifiedDepartment'], 'string', 'max' => 1000],
            [['TranVersion'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'DepartID' => 'Depart ID',
            'ModuleType' => 'Module Type',
            'Type' => 'Type',
            'Year' => 'Year',
            'FlowNumber' => 'Flow Number',
            'CaseNumber' => 'Case Number',
            'Case' => 'Case',
            'SubjectMatter' => 'Subject Matter',
            'LitigantOne' => 'Litigant One',
            'LitigantTwo' => 'Litigant Two',
            'TransferMaterial' => 'Transfer Material',
            'Supervise' => 'Supervise',
            'Chambers' => 'Chambers',
            'Agency' => 'Agency',
            'JudgmentExecuteReceives' => 'Judgment Execute Receives',
            'TropschOffice' => 'Tropsch Office',
            'SendCycle' => 'Send Cycle',
            'SendDate' => 'Send Date',
            'EntrustCycle' => 'Entrust Cycle',
            'MaterialsCompletionDate' => 'Materials Completion Date',
            'GetbackDate' => 'Getback Date',
            'Cycle' => 'Cycle',
            'Result' => 'Result',
            'Price' => 'Price',
            'UnitID' => 'Unit ID',
            'InputMan' => 'Input Man',
            'InputDate' => 'Input Date',
            'EditMan' => 'Edit Man',
            'EditDate' => 'Edit Date',
            'Remark' => 'Remark',
            'EntrustDeparment' => 'Entrust Deparment',
            'ChoiceWay' => 'Choice Way',
            'Money' => 'Money',
            'IsAdoption' => 'Is Adoption',
            'FllowResult' => 'Fllow Result',
            'Time1' => 'Time1',
            'Status1' => 'Status1',
            'Price1' => 'Price1',
            'Time2' => 'Time2',
            'Status2' => 'Status2',
            'Price2' => 'Price2',
            'Time3' => 'Time3',
            'Status3' => 'Status3',
            'Price3' => 'Price3',
            'Time4' => 'Time4',
            'BeginDate' => 'Begin Date',
            'IdentifiedType' => 'Identified Type',
            'IdentifiedCondition' => 'Identified Condition',
            'ChoicedDate' => 'Choiced Date',
            'FirstDraftDate' => 'First Draft Date',
            'AnnouncementDate1' => 'Announcement Date1',
            'StartAuctionPrice1' => 'Start Auction Price1',
            'AnnouncementDate2' => 'Announcement Date2',
            'StartAuctionPrice2' => 'Start Auction Price2',
            'AnnouncementDate3' => 'Announcement Date3',
            'StartAuctionPrice3' => 'Start Auction Price3',
            'NotifyPaymentDate' => 'Notify Payment Date',
            'ChargesDate' => 'Charges Date',
            'SiteSurveyDate' => 'Site Survey Date',
            'IdentifiedResult' => 'Identified Result',
            'Unadoption' => 'Unadoption',
            'SourceIdentifiedDepartment' => 'Source Identified Department',
            'SourceIdentifiedResult' => 'Source Identified Result',
            'UndertakerTel' => 'Undertaker Tel',
            'SuperviseTel' => 'Supervise Tel',
            'TotalDate' => 'Total Date',
            'AuctionStatus' => 'Auction Status',
            'AuctionPrice' => 'Auction Price',
            'AuctionDate' => 'Auction Date',
            'SuspendedDate' => 'Suspended Date',
            'Assessor' => 'Assessor',
            'AssessorTel' => 'Assessor Tel',
            'DeliveryCourtDate' => 'Delivery Court Date',
            'SaleDate' => 'Sale Date',
            'SalePrice' => 'Sale Price',
            'SaleStatus' => 'Sale Status',
            'RetractDate' => 'Retract Date',
            'TranVersion' => 'Tran Version',
        ];
    }

    public static function years(){

        $startDate =  intval(date("Y"));
        $endDate = intval("1995");
        $dateArr = [];
        while( $startDate >=  $endDate ){
            $dateArr[ $startDate ] = $startDate;
            $startDate--;
        }
        return $dateArr;
    }

    public static function selectedMode(){
        return [
            ""=>"选择方式",
            "随机"=>"随机",
            "指定"=>"指定",
            "招标"=>"招标",
        ];
    }


 public static function PrincipalDepartment(){
        return [
            ""=>"选择委托部门 ",
            "东阳法院"=>"东阳法院",
            "佛堂"=>"佛堂",
            "佛堂庭"=>"佛堂庭",
            "黄欢"=>"黄欢",
            "季东勤"=>"季东勤",
            "季文超"=>"季文超",
            "简二庭"=>"简二庭",
            "简一庭"=>"简一庭",
            "骆巧梅"=>"骆巧梅",
            "民二庭"=>"民二庭",
            "民三"=>"民三",
            "民三庭"=>"民三庭",
            "民一庭"=>"民一庭",
            "上溪庭"=>"上溪庭",
            "绍兴法院"=>"绍兴法院",
            "苏溪庭"=>"苏溪庭",
            "吴新辉"=>"吴新辉",
            "项孟进"=>"项孟进",
            "行政庭"=>"行政庭",
            "巡回庭"=>"巡回庭",
            "知识产权庭"=>"知识产权庭",
            "执和行庭"=>"执和行庭",
            "执行局"=>"执行局",
            "执行庭"=>"执行庭",
            "诸暨法院"=>"诸暨法院",
            "廿二里庭"=>"廿二里庭",
            "廿三法庭"=>"廿三法庭",
            "廿三里"=>"廿三里",
            "廿三里庭"=>"廿三里庭",

        ];
    }




}
